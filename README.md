# Project Title: SunSonSolar01

## System Description

SunSonSolar01 is a CodeIgniter 3 and MySQL application for Sun Son Solar. The public homepage introduces the company, solar benefits, consultation, installation and maintenance services, and links visitors to customer registration or account login.

## Account Process

1. Visitors can browse the home page and choose **Request a free quote** or **Create an account** to open customer registration.
2. Registration collects a customer's name, email, and password. The server validates the data and always stores a new self-registered account with the `customer` role. A role value sent manually with the request is ignored.
3. Passwords are stored as hashes using PHP `password_hash`; the application verifies the submitted password with `password_verify` at login.
4. Customers and employees use the same secure login form at `/login`. The application finds the account by email, verifies its password, regenerates the session ID, and stores the account ID, first name, and role in the session.
5. Employee accounts are not self-registered. HR or an administrator must provision them in the `users` table with role `employee` and any applicable department. The existing table schema supports this role.
6. Authenticated users can end their session with the **Log Out** button, which submits a POST request.

## Setup

Import `database.sql` into MySQL, configure the database connection in `application/config/database.php`, and open the project through the configured local web server. The default route displays the public homepage; `/register`, `/login`, and `/logout` handle account actions.
