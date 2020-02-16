<?php

    class Users extends Controller{
        public function __construct() {
            $this->userModel = $this->model('User');
        }

        public function register() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'username' => trim($_POST['username']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'username_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];

                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                }else {
                    if($this->userModel->findUserByEmail($data['email'])) {
                        $data['email_err'] = 'Email is taken';
                    }
                }
                
                if(empty($data['username'])) {
                    $data['username_err'] = 'Please enter username';
                }

                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                }elseif(strlen($data['password']) < 6) {
                    $data['password_err'] = 'Password must be at least 6 characters';
                }

                if(empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Please enter confirm password';
                }else {
                    if($data['password'] != $data['confirm_password']) {
                        $data['confirm_password_err'] = 'Password must be match';
                    }
                }

                if(empty($data['email_err']) && empty($data['username_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {

                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    if($this->userModel->register($data)) {
                        flash('register-success', 'You are register');
                        redirect('users/login');
                    }else {
                        die('Something went wrong');
                    }

                }else {
                    $this->view('users/register', $data);
                }

                

            }else {
                $data = [
                    'username' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'username_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];

                $this->view('users/register', $data);
            }
        }

        public function login() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',

            ];

            if(empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            if(empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }elseif(strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            if($this->userModel->findUserByEmail($data['email'])) {

            }else {
                $data['email_err'] = 'No user found';
            }
            
            if(empty($data['email_err']) && empty($data['password_err'])) {
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                }else {
                    $data['password_err'] = 'Password inccorect';

                    $this->view('users/login', $data);
                }
            }else {
                $this->view('users/login', $data);
            }

            }else {
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => '',
                  
                ];

                $this->view('users/login', $data);
            }
        }

        public function createUserSession($user) {
            $_SESSION['user_id'] = $user->id; 
            $_SESSION['user_email'] = $user->email; 
            $_SESSION['user_username'] = $user->username;
            
            redirect('pages/index');
        }

        public function logout() {
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_username']);
            session_destroy();
            redirect('users/login');
        }

        public function isLoggedIn() {
            if(isset($_SESSION['user_id'])) {
                return true;
            }else {
                return false;
            }
        }
    }