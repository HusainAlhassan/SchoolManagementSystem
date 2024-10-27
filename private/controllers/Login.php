<?php
// Home CONTROLLER
class Login extends Controller
{

  public function index()
  {
    $errors = array();

    if (count($_POST) > 0) {

      $user = new User();
      if ($row = $user->where('email', $_POST['email'])) {

        $row = $row[0];
        if (password_verify($_POST['password'], $row->password)) {

          Auth::authenticate($row);

          $this->redirect('home');
        }
      }
      $errors['email'] = "Incorrect email or Password";
      logError('Incorrect email or Password');
    }
    $this->view("login", ['errors' => $errors]);
  }
}
