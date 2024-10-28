<?php
class Classes extends Controller
{
    public function index($id = '')
    {
        if (!Auth::isCurrentUserLogIn())
            $this->redirect('login');

        $class = new Classes('Classes');
        $data = $class->fetchAll();

        $breadcrumbs[] = ['Dashboard', '/'];
        $breadcrumbs[] = ['Classes', 'classes'];

        $this->view('classes', [
            'rows' => $data,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function add($id = '')
    {
        $errors = array();

        if (!Auth::isCurrentUserLogIn())
            $this->redirect('login');

        $class = new Classes('Classes');

        if (count($_POST) > 0) {
            if ($class->validateUserInput($_POST)) {
                $_POST['date'] = date("Y-m-d H:i:s");
                $class->insert($_POST);
                $this->redirect('classes');
            } else {
                $errors = $class->errors;
            }
        }

        $breadcrumbs[] = ['Dashboard', '/'];
        $breadcrumbs[] = ['Classes', 'classes'];
        $breadcrumbs[] = ['Add', 'classes/add'];

        $this->view('classes.add', [
            'errors' => $errors,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function edit($id = null)
    {
        $errors = array();

        if (!Auth::isCurrentUserLogIn())
            $this->redirect('login');

        $class = new Classes('Classes');

        if (count($_POST) > 0) {
            if ($class->validateUserInput($_POST)) {
                $class->update($id, $_POST);
                $this->redirect('classes');
            } else {
                $errors = $class->errors;
            }
        }

        $row = $class->where('id', $id);
        if (!empty($row)) {
            $row = $row[0];
        }

        $breadcrumbs[] = ['Dashboard', '/'];
        $breadcrumbs[] = ['Classes', 'classes'];
        $breadcrumbs[] = ['Edit', 'classes/edit'];

        $this->view('classes.edit', [
            'row' => $row,
            'errors' => $errors,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function delete($id = null)
    {
        $errors = array();

        if (!Auth::isCurrentUserLogIn())
            $this->redirect('login');

        $class = new Classes('Classes');

        if (count($_POST) > 0) {
            $class->delete($id);
            $this->redirect('classes');
        }

        $row = $class->where('id', $id);
        if (!empty($row)) {
            $row = $row[0];
        }

        $breadcrumbs[] = ['Dashboard', '/'];
        $breadcrumbs[] = ['Classes', 'classes'];
        $breadcrumbs[] = ['Delete'];

        $this->view('classes.delete', [
            'row' => $row,
            'errors' => $errors,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }
}
