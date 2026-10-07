<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('form_validation');
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
            'birth_date',
            'Birth date',
            'trim|required|callback_valid_birth_date'
        );
        $this->form_validation->set_rules(
            'gender',
            'Gender',
            'required|in_list[female,male,prefer_not_to_say]'
        );
        $this->form_validation->set_rules(
            'phone_number',
            'Phone number',
            'trim|required|min_length[7]|max_length[25]|callback_valid_phone_number'
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
            'birth_date' => $this->input->post('birth_date', TRUE),
            'gender' => $this->input->post('gender', TRUE),
            'email' => strtolower(trim($this->input->post('email', TRUE))),
            'phone_number' => trim($this->input->post('phone_number', TRUE)),
            'password' => password_hash(
                $this->input->post('password'),
                PASSWORD_DEFAULT
            ),
            'role' => $role,
            'department' => $role === 'employee'
                ? trim($this->input->post('department', TRUE))
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

    public function valid_birth_date($birth_date)
    {
        $date = DateTime::createFromFormat('Y-m-d', $birth_date);
        $is_valid = $date && $date->format('Y-m-d') === $birth_date
            && $date <= new DateTime('today');

        if (!$is_valid) {
            $this->form_validation->set_message(
                'valid_birth_date',
                'The {field} field must be a valid date in the past.'
            );
        }

        return $is_valid;
    }

    public function valid_phone_number($phone_number)
    {
        if (!preg_match('/^[0-9+() -]+$/', $phone_number)) {
            $this->form_validation->set_message(
                'valid_phone_number',
                'The {field} field may contain only digits, spaces, and +, (, or ).'
            );
            return FALSE;
        }

        return TRUE;
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
