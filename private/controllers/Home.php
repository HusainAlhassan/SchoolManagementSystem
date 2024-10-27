<?php
// Home CONTROLLER
class Home extends Controller
{
   public function index($id = '')
   {

      if (!Auth::isCurrentUserLogIn())
         $this->redirect('login');

      $user = new User('User');
      $data = $user->fetchAll();

      $this->view('home', ['rows' => $data]);
   }
}
