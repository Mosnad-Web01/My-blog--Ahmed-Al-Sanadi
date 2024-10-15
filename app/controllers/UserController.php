<?php

require_once '../models/User.php';

class UserController
{
    private $userModel;

    public function __construct($db)
    {
        $this->userModel = new User($db);
    }
    
    public function SignIn()
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];

            // Validate email
            if (empty($email)) {
                $errors['email'] = "Email field must not be empty.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Invalid email format.";
            }

            // Validate password
            if (empty($password)) {
                $errors['password'] = "Password field must not be empty.";
            }

            // Proceed only if there are no validation errors
            if (empty($errors)) {
                try {
                    // Attempt to sign in
                    if ($this->userModel->signIn($email, $password)) {
                        $_SESSION['message'] = "You have successfully signed in.";
                        header("Location: /my-blog/home");
                        exit();
                    } else {
                        $errors['general'] = "Invalid email or password.";
                    }
                } catch (Exception $e) {
                    $errors['general'] = "An unexpected error occurred: " . $e->getMessage();
                }
            }

            // Store errors in session for display on the form
            $_SESSION['errors'] = $errors;
        }
    }

    public function store()
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = trim($_POST['name']);
            $username = trim($_POST['username']);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];


            if (empty($name)) {
                $errors['name'] = "Name is required.";
            }

            if (empty($username)) {
                $errors['username'] = "Username is required.";
            }

            if (empty($email)) {
                $errors['email'] = "Email is required.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Invalid email format.";
            }

            if (empty($password)) {
                $errors['password'] = "Password is required.";
            } elseif (strlen($password) < 8) {
                $errors['password'] = "Password must be at least 8 characters long.";
            }

            if (empty($errors)) {
                try {
                    // Attempt to sign up the user
                    $isCreated = $this->userModel->signUp($name, $username, $email, $password);


                    if ($isCreated) {

                        $_SESSION['message'] = "Your account has been created successfully. Please sign in.";
                        header("Location: /my-blog/sign-in");
                        exit();

                    } else {
                        $errors['general'] = "An error occurred while creating your account. Please try again.";
                    }
                } catch (Exception $e) {
                    $errors['general'] = "An unexpected error occurred: " . $e->getMessage();
                }
            }
            $_SESSION['errors'] = $errors;
        }
    }



    public function logout(): void
    {
        // Unset all session variables
        $_SESSION = [];

        // destroy the session
        session_destroy();
        header('Location: /my-blog/home');
        exit();
    }

}