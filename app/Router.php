<?php

namespace App;

use App\Models\Scuba;
use duncan3dc\Laravel\BladeInstance;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Exception\NoConfigurationException;

class Router
{
    public function __invoke(RouteCollection $routes)
    {
        $context = new RequestContext();

        // Routing can match routes with incoming requests
        $matcher = new UrlMatcher($routes, $context);
        try {
            // rtrim function is to enable both '/' and '' suffix allowance for routes
            $matcher = $matcher->match(rtrim($_SERVER['REQUEST_URI'], '/'));

            // Cast params to int if numeric
            array_walk($matcher, function(&$param)
            {
                if (is_numeric($param))
                {
                    $param = (int) $param;
                }
            });

            // Non-static method should not be called statically
            $className = '\\App\\Controllers\\' . $matcher['controller'];
            $classInstance = new $className();

            // Add routes as parameters to the next class
            $params = array_merge(array_slice($matcher, 2, -1), array('routes' => $routes));

            // if Scuba is not deployed yet, force setup route
            if (Scuba::isDeployed() === false) {
                $className = '\\App\\Controllers\\ScubaController';
                $classInstance = new $className();
                call_user_func_array(array($classInstance, 'setup'), $params);
            } else {
                // If Scuba is already deployed and setup route is requested redirect to admin dashboard
                if ($className = '\\App\\Controllers\\ScubaController' && $matcher['method'] == 'setup') {
                    flash_warning("Scuba a déjà été installé");
                    $className = '\\App\\Controllers\\DashboardController';
                    $classInstance = new $className();
                    call_user_func_array(array($classInstance, 'index'), $params);
                // Or redirect to requested route
                } else {
                    call_user_func_array(array($classInstance, $matcher['method']), $params);
                }
            }


        } catch (MethodNotAllowedException $e) {
            echo 'Route method is not allowed.';
        } catch (ResourceNotFoundException $e) {
            $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
            echo $blade->render("errors.404");
        }
    }
}

// Invoke
$router = new Router();
$router($routes);