<?php

use duncan3dc\Laravel\BladeInstance;

require '../vendor/autoload.php';
require '../bootstrap.php';

$router = new AltoRouter();
$blade = new BladeInstance(BASE_PATH . "/views", BASE_PATH . "/cache/views");

$router->map('GET', '/', function () {
    echo '/';
});

$router->map('GET', '/nous-contacter', function () {
    echo '/contact';
});

$router->map('GET', '/blog/[*:slug]-[i:id]', function ($slug, $id) {
    echo "Article $slug avec id $id";
});

$match = $router->match();

if ($match !== null) {
    if (is_callable($match['target'])) {
        call_user_func_array($match['target'], $match['params']);
        $params = $match['params'];
        // dump($params);
    } else {
        $params = $match['params'];
        // dump($params);
        echo $blade->render(
            "admin.sections.static.index"
        );
    }
}