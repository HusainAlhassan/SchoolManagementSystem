<?php
// Define the Signup controller class, which extends the Controller class
class Signup extends Controller
{
    // Index method, which handles the default action for this controller
    public function index()
    {

        $errors = array();

        if (count($_POST) > 0) {
            $user = new User();
            if ($user->validateUserInput($_POST)) {

                $_POST['date'] = date("Y-m-d H:i:s");

                $user->insert($_POST);
                $this->redirect('users');
            } else {
                $errors = $user->errors;
            }
        }

        // Render the signup view, passing the $errors array as a parameter
        $this->view("signup", ['errors' => $errors]);
    }
}
