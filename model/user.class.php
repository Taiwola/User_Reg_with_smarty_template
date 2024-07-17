<?php
class UserRegistration
{
    private $conn;
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
     * @param $conn connection string
     */
    public function __construct($username, $email, $password, $conn)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->conn = $conn;
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
     * Saves the user data to the database.
     *
     * @return bool Returns true on success, false on failure.
     */
    public function save()
    {

        if (!$this->validate()) {
            return false;
        }

        $userexist_query = "SELECT * FROM user WHERE username='$this->username'";
        $result = mysqli_query($this->conn, $userexist_query);
        $rows_count = mysqli_num_rows($result);

        if ($rows_count > 0) {
            $this->errors['username'] = 'username already in use';
            return false;
        }

        $emailexist_query = "SELECT * FROM user WHERE email='$this->email'";
        $email_result = mysqli_query($this->conn, $emailexist_query);
        $email_rows_count = mysqli_num_rows($email_result);

        if ($email_rows_count > 0) {
            $this->errors['email'] = 'email already exist';
            return false;
        }

        // hash password
        $hash_pwd = password_hash($this->password, PASSWORD_BCRYPT);

        $username = $this->username;
        $email = $this->email;

        $insert_query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$hash_pwd')";


        $sql_execute = mysqli_query($this->conn, $insert_query);

        if ($sql_execute) {
            return true;
        } else {
            $this->errors['db'] = "Something went wrong, try later";
            return false;
        }
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
