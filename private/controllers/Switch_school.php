<?php
// Home CONTROLLER
class Switch_school extends Controller
{
    public function index($id = '')
    {

        Auth::switchSchool($id);
        $this->redirect('schools');
    }
}
