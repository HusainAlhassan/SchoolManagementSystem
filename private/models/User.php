<?php

// Define a User class that extends the Model class
class User extends Model
{
    /**
     * List of allowed columns for user data
     *
     * @var array
     */
    protected $allAllowedColumns = [
        'first_name',
        'last_name',
        'email',
        'gender',
        'password',
        'rank',
        'date'
    ];

    /**
     * List of methods to run before inserting user data into the table
     *
     * @var array
     */
    protected $runBeforeInsertIntoTable = [
        'generateUniqueUserId',
        'generateUniqueSchoolId',
        'passwordHash'
    ];

    /**
     * Validate user input data
     *
     * @param array $userData User input data
     * @return bool True if data is valid, false otherwise
     */
    public function validateUserInput(array $userData): bool
    {
        $this->errors = []; // Initialize an array to hold error messages

        // Validate first name
        $this->validateName($userData['first_name'], 'first name');

        // Validate last name
        $this->validateName($userData['last_name'], 'last name');

        // Validate email
        if (empty($userData['email']) || !filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Enter a valid email address.";
        }
        // Email  is already taken
        if ($this->where('email', $userData['email'])) {
            $this->errors[] = "The email has been taken already";
        }

        // Validate gender
        $validGenders = ['male', 'female'];
        if (empty($userData['gender']) || !in_array($userData['gender'], $validGenders)) {
            $this->errors[] = "Enter a valid gender.";
        }

        // Validate rank
        $validRanks = ['student', 'lecturer', 'reception', 'admin', 'super_admin'];
        if (empty($userData['rank']) || !in_array($userData['rank'], $validRanks)) {
            $this->errors[] = "Enter a valid rank.";
        }

        // Validate password
        $this->validatePassword($userData['password'], $userData['confirm_password']);

        // Return true if there are no errors; otherwise, return false
        return empty($this->errors);
    }

    /**
     * Validate name fields
     *
     * @param string $name Name to validate
     * @param string $fieldName Field name for error message
     */
    private function validateName(string $name, string $fieldName): void
    {
        if (empty($name) || !preg_match('/^[a-zA-Z]+$/', $name)) {
            $this->errors[] = "Only letters are allowed in $fieldName.";
        }
    }

    /**
     * Validate password fields
     *
     * @param string $password Password to validate
     * @param string $confirmPassword Confirm password to validate
     */
    private function validatePassword(string $password, string $confirmPassword): void
    {
        if ($password !== $confirmPassword) {
            $this->errors[] = "Passwords do not match.";
        }

        if (strlen($password) < 5) {
            $this->errors[] = "Password should be at least five characters.";
        }
    }

    /**
     * Generate a unique user ID
     *
     * @param array $data User data
     * @return array User data with generated user ID
     */
    public function generateUniqueUserId($data)
    {
        // $data['user_id'] = randomStringGenerator(60);
        $data['user_id'] = strtolower($data['first_name'] . '.' . $data['last_name']);
        while ($this->where('user_id', $data['user_id'])) {
            $data['user_id'] .= rand(10, 9999);
        }
        return $data;
    }

    /**
     * Generate a unique school ID
     *
     * @param array $data User data
     * @return array User data with generated school ID
     */
    public function generateUniqueSchoolId($data)
    {
        if (isset($_SESSION['CURRENT_USER_ID']->school_id)) {
            $data['school_id'] = $_SESSION['CURRENT_USER_ID']->school_id;
        }
        return $data;
    }

    /**
     * Hash the user password
     *
     * @param array $data User data
     * @return array User data with hashed password
     */
    public function passwordHash($data)
    {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $data;
    }
}
