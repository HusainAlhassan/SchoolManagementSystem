<?php

class School extends Model
{
    protected $allAllowedColumns = [
        'school',
        'date'
    ];

    protected $runBeforeInsertIntoTable = [
        'generateUniqueUserId',
        'generateUniqueSchoolId',
    ];

    protected $runAfterSelectingRecords = [
        'getUser',
    ];

    public function validateUserInput(array $userData): bool
    {
        $this->errors = [];
        $this->validateSchoolName($userData['school'], 'School');
        return empty($this->errors);
    }

    private function validateSchoolName(string $school, string $fieldName): void
    {
        if (empty($school) || !preg_match('/^[a-zA-Z ]+$/', $school)) {
            $this->errors[] = "Only letters are allowed in $fieldName.";
        }
    }

    public function generateUniqueUserId($data)
    {
        if (isset($_SESSION['CURRENT_USER_ID']->user_id)) {
            $data['user_id'] = $_SESSION['CURRENT_USER_ID']->user_id;
        }
        return $data;
    }

    public function generateUniqueSchoolId($data)
    {
        $data['school_id'] = randomStringGenerator(60);
        return $data;
    }

    public function getUser($data)
    {
        $user = new User();
        foreach ($data as $key => $row) {
            $result = $user->where('user_id', $row->user_id);
            $data[$key]->user = is_array($result) ? $result[0] : false;
        }
        return $data;
    }
}
