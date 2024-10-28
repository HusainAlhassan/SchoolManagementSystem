<?php
// Students CONTROLLER
class Students extends Controller
{
  public function index($id = '')
  {

    if (!Auth::isCurrentUserLogIn())
      $this->redirect('login');

    $user = new User();

    $schoolId = Auth::getSchool_id();
    $data = $user->query("SELECT*FROM users WHERE  school_id =:school_id && rank IN ('student' ) ORDER BY id DESC", ['school_id' => $schoolId]);

    $breadcrumbs[] = ['Dashboard', '/'];
    $breadcrumbs[] = ['Students', 'Students'];

    $this->view('students', [
      'rows' => $data,
      'breadcrumbs' => $breadcrumbs,

    ]);
  }
}
