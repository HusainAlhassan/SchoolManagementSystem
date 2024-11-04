<?php
// Single class CONTROLLER
class Single_class extends Controller
{
    public function index($id = '')
    {

        $class = new ClassModel();
        $row = $class->fetchSingleRow('class_id', $id);

        $breadcrumbs[] = ['Dashboard', '/'];
        $breadcrumbs[] = ['Classes', 'classes'];

        if ($row) {
            $breadcrumbs[] = [$row->class, ''];
        }

        $pageTab = isset($_GET['tab']) ? $_GET['tab'] : 'lecturers';

        echo $this->view("single-class", [
            'row' => $row,
            'breadcrumbs' => $breadcrumbs,
            'pageTab' => $pageTab,
        ]);
    }
}
