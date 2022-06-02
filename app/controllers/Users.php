<?php

class Users extends Controller {
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
    // Check for POST
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

        //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //Init data
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
    // Validation
        // Validate Email
            if(empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
           //Check email
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'Email is already taken';
                }
            }

        // Validate Name
            if(empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }

        // Validate Password
            if(empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6){
                $data['password_err'] = 'Password must be at least 6 characters';
            }

        // Validate Confirm Password
            if(empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = "Password don't match";
                }
            }

        // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
            // Validated
//                die('SUCCESS');
            //Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if($this->userModel->register($data)) {
                    flash('register_success', 'You are registered and can log in');
                    redirect('index.php?url=users/login');
                } else {
                    die('Something went wrong');
                }

                } else {
                //Load view with errors
                    $this->view('users/register', $data);
                }

        } else {
        //Init data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
            ];
        //Load view
            $this->view('/users/register', $data);
        }
    }

    public function login()
    {
    // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //Init data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];
    // Validation
        // Validate Email
            if(empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

        // Validate Password
            if(empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

        // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated
                die('SUCCESS');
            } else {
            //Load view with errors
                $this->view('users/login', $data);
            }

            echo 'processing form';
    //Process form
        } else {
    //Init data
            $data = [
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
            ];
        //Load view
            $this->view('users/login', $data);
        }
    }
}



















