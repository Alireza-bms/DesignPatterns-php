<?php

// Class to perform data validation
class Validate {
    // Check if the provided data is valid
    public function isValid($data) {
        return true;
    }
}

// Class to handle user-related operations
class User {
    // Create a new user with the given data
    public function create($data) {
        return true;
    }
}

// Class to handle sending emails
class Mail {

    // Set the recipient email address; returns $this to allow method chaining
    public function to($email_address) {
        return $this;
    }

    // Set the subject of the email; returns $this for chaining
    public function subject($subject) {
        return $this;
    }

    // Send the email
    public function send() {
        return true;
    }
}

// Class to manage authentication processes
class Auth {
    // Log in a user using email and password
    public function login($email, $password) {
        return true;
    }
}

// Facade class that simplifies user signup and signin operations
class AuthFacade {
    private $validate;
    private $user;
    private $auth;
    private $email;

    /**
     * The constructor initializes all underlying components.
     */
    public function __construct() {
        $this->validate = new Validate();
        $this->user     = new User();
        $this->auth     = new Auth();
        $this->email    = new Mail();
    }

    /**
     * Sign up a new user:
     *  - Validate the provided data.
     *  - Create the user.
     *  - Log the user in.
     *  - Send a welcome email.
     */
    public function singUpUser($name, $email, $password) {
        $data = ['email' => $email, 'name' => $name, 'password' => $password];

        if ($this->validate->isValid($data)) {
            $this->user->create($data);
            $this->auth->login($data['email'], $data['password']);
            // Using Mail component with method chaining for a simple email sending process.
            $this->email->to($data['email'])->subject("Welcome!")->send();
        }
    }

    /**
     * Sign in an existing user by delegating the login to the Auth class.
     */
    public function singInUser($email, $password) {
        return $this->auth->login($email, $password);
    }
}

// Example usage of the AuthFacade
$authFacade = new AuthFacade();
$authFacade->singUpUser('hesam', 'hesam@gmail.com', '123456');
$authFacade->singInUser('hesam@gmail.com', '123456');
