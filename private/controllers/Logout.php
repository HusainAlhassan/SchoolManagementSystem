<?php
// Home CONTROLLER
class Logout extends Controller
{
    public function index($id = '')
    {

        Auth::logout();
        $this->redirect('login');
    }
}
