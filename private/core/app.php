
<?php
// Main app file
class App {
  // Default controller and method
  protected $controller = "home";
  protected $method = "index";
  protected $params = array();

  public function __construct() {
    // Get the URL parameters
    $URL = $this->getURL();

    // Check if a controller exists
    if (file_exists("../private/controllers/" . $URL[0] . ".php")) {
      // Set the controller
      $this->controller = ucfirst($URL[0]);
      unset($URL[0]);
    }

    // Require the controller file
    require "../private/controllers/" . $this->controller . ".php";

    // Create a new instance of the controller
    $this->controller = new $this->controller();

    // Check if a second url parameter is set
    if (isset($URL[1])) {
      // Check if the method exists in the controller
      if (method_exists($this->controller, $URL[1])) {
        // Set the method
        $this->method = ucfirst($URL[1]);
        unset($URL[1]);
      }
    }

    // Reset the params array
    $this->params = array_values($URL);

    // Call the controller method with the params
    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  // Get the URL parameters
  private function getURL() {
    $url = isset($_GET['url']) ? $_GET['url'] : "home";
    // Clean and sanitize the URL
    return explode("/", trim(filter_var($url, FILTER_SANITIZE_URL), "/"));
  }
}
