<?php
class Controller
{
    // Renders a view file with the provided data
    public function view($view, $data = array())
    {
        extract($data);
        // Check if the view file exists

        $viewPath = "../private/views/" . $view . ".view.php";
        if (file_exists($viewPath)) {
            // Include the view file
            require($viewPath);
        } else {
            // If the view file does not exist, load a 404 error view
            require("../private/views/404.view.php");
        }
    }

    // Loads a model file and returns an instance of the model
    public function load_model($model)
    {
        // Capitalize the model name to match the filename
        $modelName = ucfirst($model);
        $modelPath = "../private/models/" . $modelName . ".php";

        // Check if the model file exists
        if (file_exists($modelPath)) {
            // Include the model file
            require $modelPath;
            // Return a new instance of the model
            return new $modelName();
        }

        // Throw an exception if the model file is not found
        throw new Exception("Model not found: " . $modelName);
    }

    // Redirects to a specified link
    public function redirect($link)
    {
        // Send a raw HTTP header to redirect the user
        header("Location: " . ROOT . trim($link, "/"));
        // Exit the script after the redirect
        exit; // Use exit instead of die for clarity
    }
}
