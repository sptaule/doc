<?php

use duncan3dc\Laravel\BladeInstance;

require '../../bootstrap.php';
require '../../vendor/autoload.php';

if (is_post()) {

    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);

    validate_login_admin($email, $password);

}

$blade = new BladeInstance(BASE_PATH . "/views", BASE_PATH . "/cache/views");
echo $blade->render("admin.sections.static.login");