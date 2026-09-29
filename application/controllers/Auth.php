<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('url', 'form'));
    }

    public function register()
    {
        if ($this->session->userdata('user_id')) {
            redirect('home');
        }

        $this->load->view('register');
    }

    public function process_register()
    {
        if ($this->input->method(TRUE) !== 'POST') {
            show_404();
        }

        $this->form_validation->set_rules(
            'first_name',
            'First name',
            'trim|required|min_length[2]|max_length[80]'
        );
        $this->form_validation->set_rules(
            'last_name',
            'Last name',
            'trim|required|min_length[2]|max_length[80]'
        );
        $this->form_validation->set_rules(
            'email',
            'Email address',
            'trim|required|valid_email|max_length[190]|is_unique[users.email]'
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|min_length[8]|max_length[72]'
        );
        $this->form_validation->set_rules(
            'password_confirm',
            'Password confirmation',
            'required|matches[password]'
        );
        $this->form_validation->set_rules(
            'role',
            'Account type',
            'required|in_list[customer,employee]'
        );

        if ($this->input->post('role', TRUE) === 'employee') {
            $this->form_validation->set_rules(
                'department',
                'Department',
                'trim|required|max_length[100]'
            );
        }

        if (!$this->form_validation->run()) {
            $this->load->view('register');
            return;
        }

        $role = $this->input->post('role', TRUE);
        $account = array(
            'first_name' => $this->input->post('first_name', TRUE),
            'middle_name' => $this->input->post('middle_name', TRUE) ?: NULL,
            'last_name' => $this->input->post('last_name', TRUE),
            'email' => strtolower(trim($this->input->post('email', TRUE))),
            'password' => password_hash(
                $this->input->post('password'),
                PASSWORD_DEFAULT
            ),
            'role' => $role,
            'department' => $role === 'employee'
                ? $this->input->post('department', TRUE)
                : NULL
        );

        if (!$this->db->insert('users', $account)) {
            $database_error = $this->db->error();
            log_message(
                'error',
                'Account registration insert failed: '.$database_error['message']
            );

            $this->session->set_flashdata(
                'error',
                'Account creation failed. Confirm the database table is installed, then try again.'
            );
            redirect('register');
            return;
        }

        $this->session->set_flashdata(
            'success',
            'Your account is ready. Please log in.'
        );
        redirect('login');
    }

    public function login()
    {
        if ($this->session->userdata('user_id')) {
            redirect('home');
        }

        $this->load->view('login');
    }

    public function process_login()
    {
        if ($this->input->method(TRUE) !== 'POST') {
            show_404();
        }

        $this->form_validation->set_rules(
            'email',
            'Email address',
            'trim|required|valid_email'
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required'
        );

        if (!$this->form_validation->run()) {
            $this->load->view('login');
            return;
        }

        $email = strtolower(trim($this->input->post('email', TRUE)));
        $user = $this->db
            ->get_where('users', array('email' => $email))
            ->row_array();

        if (!$user || !password_verify(
            $this->input->post('password'),
            $user['password']
        )) {
            $this->session->set_flashdata(
                'error',
                'Email or password is incorrect.'
            );
            redirect('login');
            return;
        }

        $this->session->sess_regenerate(TRUE);
        $this->session->set_userdata(array(
            'user_id' => (int) $user['id'],
            'user_name' => $user['first_name'],
            'user_role' => $user['role']
        ));

        redirect('home');
    }

    public function logout()
    {
        if ($this->input->method(TRUE) !== 'POST') {
            show_404();
        }

        $this->session->sess_destroy();
        redirect('home');
    }
}
