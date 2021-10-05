<?php

use duncan3dc\Laravel\BladeInstance;

require '../../bootstrap.php';
require '../../vendor/autoload.php';

if (is_post()) {

    unset($_SESSION['admin']);
    redirect(ADMIN_LOGIN);

}