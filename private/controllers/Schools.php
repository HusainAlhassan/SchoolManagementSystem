<?php
class Schools extends Controller
{
    public function index($id = '')
    {
        if (!Auth::isCurrentUserLogIn())
            $this->redirect('login');

        $school = new School('School');
        $data = $school->fetchAll();

        $breadcrumbs[] = ['Dashboard', '/'];
        $breadcrumbs[] = ['Schools', 'schools'];

        $this->view('schools', [
            'rows' => $data,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function add($id = '')
    {
        $errors = array();

        if (!Auth::isCurrentUserLogIn())
            $this->redirect('login');

        $school = new School('School');

        if (count($_POST) > 0) {
            if ($school->validateUserInput($_POST)) {
                $_POST['date'] = date("Y-m-d H:i:s");
                $school->insert($_POST);
                $this->redirect('schools');
            } else {
                $errors = $school->errors;
            }
        }

        $breadcrumbs[] = ['Dashboard', '/'];
        $breadcrumbs[] = ['Schools', 'schools'];
        $breadcrumbs[] = ['Add', 'schools/add'];

        $this->view('schools.add', [
            'errors' => $errors,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function edit($id = null)
    {
        $errors = array();

        if (!Auth::isCurrentUserLogIn())
            $this->redirect('login');

        $school = new School('School');

        if (count($_POST) > 0) {
            if ($school->validateUserInput($_POST)) {
                $school->update($id, $_POST);
                $this->redirect('schools');
            } else {
                $errors = $school->errors;
            }
        }

        $row = $school->where('id', $id);
        if (!empty($row)) {
            $row = $row[0];
        }

        $breadcrumbs[] = ['Dashboard', '/'];
        $breadcrumbs[] = ['Schools', 'schools'];
        $breadcrumbs[] = ['Edit', 'schools/edit'];

        $this->view('schools.edit', [
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

        $school = new School('School');

        if (count($_POST) > 0) {
            $school->delete($id);
            $this->redirect('schools');
        }

        $row = $school->where('id', $id);
        if (!empty($row)) {
            $row = $row[0];
        }

        $breadcrumbs[] = ['Dashboard', '/'];
        $breadcrumbs[] = ['Schools', 'schools'];
        $breadcrumbs[] = ['Delete'];

        $this->view('schools.delete', [
            'row' => $row,
            'errors' => $errors,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }
}
