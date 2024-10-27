<?php
// Profile CONTROLLER
class Profile extends Controller
{
   public function index($id = '')
   {
      $user = new User();
      $row = $user->fetchSingleRow('user_id', $id);

      $breadcrumbs[] = ['Dashboard', '/'];
      $breadcrumbs[] = ['Profile', 'Profile'];

      if ($row) {
         $breadcrumbs[] = [$row->first_name, 'Profile'];
      }

      echo $this->view("profile", [
         'row' => $row,
         'breadcrumbs' => $breadcrumbs,
      ]);
   }
}
