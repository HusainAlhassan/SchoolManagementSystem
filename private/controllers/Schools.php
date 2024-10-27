<?php
// Home CONTROLLER
class Schools extends Controller
{
    // Display a list of all schools
    public function index($id = '')
    {
        // Check if the user is logged in; if not, redirect to login page
        if (!Auth::isCurrentUserLogIn())
            $this->redirect('login');

        // Create a new instance of the School model
        $school = new School('School');
        // Fetch all school records from the database
        $data = $school->fetchAll();

        $breadcrumbs[] = ['Dashboard', '/'];
        $breadcrumbs[] = ['Schools', 'schools'];


        // Render the 'schools' view and pass the school data
        $this->view('schools', [
            'rows' => $data,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    // Add a new school record
    public function add($id = '')
    {
        $errors = array(); // Initialize an array to hold validation errors

        // Check if the user is logged in; if not, redirect to login page
        if (!Auth::isCurrentUserLogIn())
            $this->redirect('login');

        // Create a new instance of the School model
        $school = new School('School');

        // Check if form data has been submitted
        if (count($_POST) > 0) {
            // Validate the user input
            if ($school->validateUserInput($_POST)) {
                // Add the current date and time to the input data
                $_POST['date'] = date("Y-m-d H:i:s");

                // Insert the new school record into the database
                $school->insert($_POST);
                // Redirect to the schools list after successful insertion
                $this->redirect('schools');
            } else {
                // Capture validation errors
                $errors = $school->errors;
            }
        }

        $breadcrumbs[] = ['Dashboard', '/'];
        $breadcrumbs[] = ['Schools', 'schools'];
        $breadcrumbs[] = ['Add', 'schools/add'];
        // Render the 'schools.add' view and pass any validation errors
        $this->view('schools.add', [
            'errors' => $errors,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    // Edit an existing school record
    public function edit($id = null)
    {
        $errors = array(); // Initialize an array to hold validation errors

        // Check if the user is logged in; if not, redirect to login page
        if (!Auth::isCurrentUserLogIn())
            $this->redirect('login');

        // Create a new instance of the School model
        $school = new School('School');

        // Check if form data has been submitted
        if (count($_POST) > 0) {
            // Validate the user input
            if ($school->validateUserInput($_POST)) {
                // Update the school record in the database
                $school->update($id, $_POST);
                // Redirect to the schools list after successful update
                $this->redirect('schools');
            } else {
                // Capture validation errors
                $errors = $school->errors;
            }
        }

        // Retrieve the existing school record for editing
        $row = $school->where('id', $id);
        if (!empty($row)) {
            // Get the first record from the result set
            $row = $row[0];
        }
        $breadcrumbs[] = ['Dashboard', '/'];
        $breadcrumbs[] = ['Schools', 'schools'];
        $breadcrumbs[] = ['Edit', 'schools/edit'];

        // Render the 'schools.edit' view and pass the school data and any validation errors
        $this->view('schools.edit', [
            'row' => $row,
            'errors' => $errors,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }
    // delete an existing school record
    public function delete($id = null)
    {
        $errors = array(); // Initialize an array to hold validation errors

        // Check if the user is logged in; if not, redirect to login page
        if (!Auth::isCurrentUserLogIn())
            $this->redirect('login');

        // Create a new instance of the School model
        $school = new School('School');

        if (count($_POST) > 0) {
            // Update the school record in the database
            $school->delete($id);
            // Redirect to the schools list after successful update
            $this->redirect('schools');
        }


        // Retrieve the existing school record for editing
        $row = $school->where('id', $id);
        if (!empty($row)) {
            // Get the first record from the result set
            $row = $row[0];
        }

        $breadcrumbs[] = ['Dashboard', '/'];
        $breadcrumbs[] = ['Schools', 'schools'];
        $breadcrumbs[] = ['Delete'];

        // Render the 'schools.edit' view and pass the school data and any validation errors
        $this->view('schools.delete', [
            'row' => $row,
            'errors' => $errors,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }
}
