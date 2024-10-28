<?php

class Classes extends Model
{
    protected $table = "classes";
    protected $allAllowedColumns = ['classes', 'date'];
    protected $runBeforeInsertIntoTable = [
        'generateUniqueUserId',
        'generateUniqueSchoolId',
        'generateUniqueClassId',
    ];
    protected $runAfterSelectingRecords = ['getUser'];

    public function validateUserInput(array $userData): bool
    {
        $this->errors = [];
        $this->validateSchoolName($userData['class'], 'Class');
        return empty($this->errors);
    }

    private function validateSchoolName(string $class, string $fieldName): void
    {
        if (empty($class) || !preg_match('/^[a-zA-Z ]+$/', $class)) {
            $this->errors[] = "Only letters are allowed in $fieldName.";
        }
    }

    public function generateUniqueUserId($data)
    {
        if (isset($_SESSION['CURRENT_USER_ID']->user_id))
            $data['user_id'] = $_SESSION['CURRENT_USER_ID']->user_id;

        return $data;
    }

    public function generateUniqueSchoolId($data)
    {
        if (isset($_SESSION['CURRENT_USER_ID']->school_id))
            $data['school_id'] = $_SESSION['CURRENT_USER_ID']->school_id;

        return $data;
    }

    public function generateUniqueClassId($data)
    {
        $data['class_id'] = randomStringGenerator(60);
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
