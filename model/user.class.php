<?php
class UserRegistration
{
    private $username;
    private $email;
    private $password;
    private $errors = []; // Array to store validation errors

    /**
     * Constructor to initialize the object with username, email, and password.
     *
     * @param string $username
     * @param string $email
     * @param string $password
     */
    public function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Validates the username, email, and password.
     *
     * @return bool Returns true if all fields pass validation; otherwise, false.
     */
    public function validate()
    {
        $this->errors = []; // Reset errors array

        // Validate username
        if (empty($this->username)) {
            $this->errors['username'] = 'Username is required.';
        }

        // Validate email
        if (empty($this->email)) {
            $this->errors['email'] = 'Email is required.';
        } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Invalid email format.';
        }

        // Validate password
        if (empty($this->password)) {
            $this->errors['password'] = 'Password is required.';
        } else {
            $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
            if (!preg_match($pattern, $this->password)) {
                $this->errors['password'] = 'Password must contain at least one lowercase letter, one uppercase letter, and one digit, and be at least 8 characters long.';
            }
        }

        return empty($this->errors); // Return true if no errors, otherwise false
    }

    /**
     * Placeholder method to save user data (typically would save to a database).
     *
     * @return bool Always returns true for simplicity.
     */
    public function save()
    {
        // Here you would typically save the user data to a database
        // For simplicity, we will just return true
        return true;
    }

    /**
     * Returns the array of validation errors.
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
