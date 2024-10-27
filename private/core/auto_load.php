<?php

include "config.php";
include "appUtils.php";
include "database.php";
include "controller.php";
include "model.php";
include "app.php";


spl_autoload_register(function ($class_name) {
    require "../private/models/" . ucfirst($class_name) . ".php";
});
