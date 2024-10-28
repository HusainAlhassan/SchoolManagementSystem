<?php

// Define a School class that extends the Model class
class Classes extends Model
{
    protected $table = "classes";
    /**
     * List of allowed columns for user data
     *
     * @var array
     */
    protected $allAllowedColumns = [
        'class',
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

    ];
    /**
     * List of methods to run before inserting user data into the table
     *
     * @var array
     */
    protected $runAfterSelectingRecords = [
        'getUser',

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
        // Validate school name
        $this->validateSchoolName($userData['class'], 'Class');
        // Return true if there are no errors; otherwise, return false
        return empty($this->errors);
    }

    /**
     * Validate school fields
     *
     * @param string $school Name to validate
     * @param string $fieldName Field name for error message
     */
    private function validateSchoolName(string $class, string $fieldName): void
    {
        if (empty($class) || !preg_match('/^[a-zA-Z ]+$/', $class)) {
            $this->errors[] = "Only letters are allowed in $fieldName.";
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
        if (isset($_SESSION['CURRENT_USER_ID']->user_id))
            $data['user_id'] = $_SESSION['CURRENT_USER_ID']->user_id;

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

        $data['school_id'] = randomStringGenerator(60);;
        return $data;
    }
    /**
     *  get user details
     *
     * @param array $data User data
     * @return array User data to user to the array
     */
    public function getUser($data)
    {
        $user =  new User();

        foreach ($data as $key => $row) {
            $result = $user->where('user_id', $row->user_id);
            $data[$key]->user = is_array($result) ? $result[0] : false;
        }


        return $data;
    }
}
