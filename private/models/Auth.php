<?php

class Auth
{
    // Authenticate the user by storing user data in the session
    public static function Authenticate($row)
    {
        // Store the user information in the session
        $_SESSION['CURRENT_USER_ID'] = $row;
        // Regenerate session ID for security (to prevent session hijacking)
        session_regenerate_id(true);
    }

    // Check if the current user is logged in
    public static function isCurrentUserLogIn()
    {
        // Check if the USER session variable is set
        if (isset($_SESSION['CURRENT_USER_ID']))
            return true; // User is logged in
        return false; // User is not logged in
    }
    // Check if the current user is logged in
    public static function currentUsername()
    {
        return isset($_SESSION['CURRENT_USER_ID']) ? $_SESSION['CURRENT_USER_ID']->first_name : false;
    }
    // Check if the current user is logged in
    public static function __callStatic($method, $params)
    {
        $properties = strtolower(str_replace("get", "", $method));
        // Check if the USER session variable is set
        if (isset($_SESSION['CURRENT_USER_ID']->$properties))
            return $_SESSION['CURRENT_USER_ID']->$properties; // Return logged details 
        return "Unknown"; // User is not logged in
    }

    // Method to switch the school for the currently logged in user
    public static function switchSchool($id)
    {
        if (isset($_SESSION['CURRENT_USER_ID']) && $_SESSION['CURRENT_USER_ID']->rank === 'super_admin') {
            $user = new User();
            $school = new School();

            if ($row =  $school->where('id', $id)) {
                $row = $row[0];
                $arr['school_id'] = $row->school_id;

                $user->update($_SESSION['CURRENT_USER_ID']->id, $arr);
                $_SESSION['CURRENT_USER_ID']->school_id = $row->school_id;
                $_SESSION['CURRENT_USER_ID']->school_name = $row->school;
            }
            return true;
        }
        return false; // User is
    }



    // Log out the current user
    public static function logout()
    {
        // Check if the USER session variable is set
        if (isset($_SESSION['CURRENT_USER_ID'])) {
            // Unset the USER session variable
            unset($_SESSION['CURRENT_USER_ID']);
            // Optionally destroy the session completely for security
            session_destroy();
        }
    }
}
