<?php
// Users CONTROLLER
class Users extends Controller
{
    public function index($id = '')
    {

        if (!Auth::isCurrentUserLogIn())
            $this->redirect('login');

        $user = new User();

        $schoolId = Auth::getSchool_id();
        $data = $user->query("SELECT*FROM users WHERE  school_id =:school_id  && rank NOT IN ('student' ) ORDER BY id DESC", ['school_id' => $schoolId]);

        $breadcrumbs[] = ['Dashboard', '/'];
        $breadcrumbs[] = ['Staff', 'users'];

        $this->view('users', [
            'rows' => $data,
            'breadcrumbs' => $breadcrumbs,
            'mode' => 'users',
        ]);
    }
}
