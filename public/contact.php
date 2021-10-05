<?php

use duncan3dc\Laravel\BladeInstance;

require '../bootstrap.php';
require '../vendor/autoload.php';

$blade = new BladeInstance(BASE_PATH . "/views", BASE_PATH . "/cache/views");
echo $blade->render("sections.static.contact");