<?php

use duncan3dc\Laravel\BladeInstance;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Define base directory
define('BASE_PATH', str_replace("\\", "/", __DIR__));
define('APP_PATH', str_replace("\\", "/", __DIR__) . '/app');

// require libs that are required on almost/every page
session_start();
import("Auth");
import('Flash');
import('Database');
import('Routes');
import('Validation');
import('Pictures');

// === === === === === === CSRF_TOKEN === === === === === ===
$_SESSION['CSRF_TOKEN'] = $_SESSION['CSRF_TOKEN'] ?? random_str();

function csrf_input($delay = 600): string
{
    $expiration_time = time() + $delay;
    $hash = hash_hmac('sha256', $expiration_time, $_SESSION['CSRF_TOKEN']);
    return "<input type='hidden' name='CSRF_TOKEN' value='{$expiration_time}-{$hash}'>";
}

function save_inputs()
{
    foreach ($_POST as $key => $value) {
        if (in_array($key, ['password'])) {
            continue;
        }
        $_SESSION['inputs'] = $_SESSION['inputs'] ?? [];
        $_SESSION['inputs'][$key] = $value;
    }
}

function get_inputs()
{
    static $inputs;
    if ($inputs) {
        return $inputs;
    }
    $inputs = $_SESSION['inputs'] ?? [];
    $_SESSION['inputs'] = [];
    return $inputs;
}

function get_input($key)
{
    return get_inputs()[$key] ?? null;
}

/**
 * Import a library from "libs" folder
 * @param string $lib
 */
function import(string $lib)
{
    require_once (__DIR__ . "/libs/{$lib}.php");
}

/**
 * Is the user is on this page
 * @param string $page
 * @return bool
 */
function is_on_page(string $page): bool
{
    return $_SERVER['SCRIPT_NAME'] === $page;
}

/**
 * Is the user is on this directory
 * @param string $directory
 * @return bool
 */
function is_on_directory(string $directory): bool
{
    return str_starts_with($_SERVER['SCRIPT_NAME'], $directory);
}

/**
 * Delete a directory (even if not empty)
 * @param $dir
 * @return bool
 */
function deleteDirectory($dir): bool
{
    if (!file_exists($dir)) {
        return true;
    }
    if (!is_dir($dir)) {
        return unlink($dir);
    }
    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }
        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }
    }
    return rmdir($dir);
}

function is_dir_empty($dir): ?bool
{
    if (!is_readable($dir)) return NULL; 
    return (count(scandir($dir)) == 2);
}

function sanitize(mixed $var): string
{
    return htmlspecialchars(strip_tags($var));
}

function shorten(string $string, int $start = 0, int $limit = 120, bool $stripTags = true): string
{
    if ($stripTags === true) {
        $string = strip_tags(html_entity_decode($string));
    }
    if (strlen($string) < $limit) {
        return $string;
    } else {
        $shortenedString = substr($string, $start, $limit - 6);
        $shortenedString .= " [...]";
        return $shortenedString;
    }
}

function partial($__name, $params = [])
{
    // import HTML view from partials directory
    extract($params);
    require(__DIR__ . "/partials/{$__name}.html.php");
}

function is_post(bool $csrf = true): bool
{
    $is_post = ($_SERVER['REQUEST_METHOD'] ?? 'CLI') === 'POST';
    if ($is_post) {
        if ($csrf === true) {
            if (!isset($_POST['CSRF_TOKEN'])) {
                throw new RuntimeException("CSRF manquant !");
            }
            [$time, $hash] = explode('-', $_POST['CSRF_TOKEN']);
            if ($time < time()) {
                flash_warning("Le formulaire a expiré, veuillez réessayer");
                save_inputs();
                redirect_self();
            }
            if ($hash !== hash_hmac('sha256', $time, $_SESSION['CSRF_TOKEN'])) {
                flash_danger("Problème avec le formulaire, veuillez réessayer");
                save_inputs();
                redirect_self();
            }
        }
    }
    return $is_post;
}

function slugify($string): string
{
    $text = strip_tags($string);
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    setlocale(LC_ALL, 'en_US.utf8');
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    $text = strtolower($text);
    if (empty($text)) { return 'n-a'; }
    return $text;
}

function random_str($length = 100): string
{
    $characters = '123456789abcdefghjkmnopqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function pluralize(int $count, string $none, string $one, string $multiples): string
{
    if ($count === 0) {
        return str_replace("{count}", $count, $none);
    }
    if ($count === 1) {
        return str_replace("{count}", $count, $one);
    }
    return str_replace("{count}", $count, $multiples);
}

/**
 * @throws Exception
 */
function display_date($date, $format = 'd/m/y'): string
{
    $theDate = new DateTime($date);
    return $stringDate = $theDate->format($format);
}

/**
 * @throws Exception
 */
function display_time($date, $format = 'G:i'): string
{
    $theDate = new DateTime($date);
    return $stringDate = $theDate->format($format);
}

function display_price(string $price): string
{
    return str_replace('.', ',', $price);
}

function generate_captcha(int $number_a, int $number_b): string
{

    $literals = [
        0 => "zero",
        1 => "un",
        2 => "deux",
        3 => "trois",
        4 => "quatre",
        5 => "cinq",
        6 => "six",
        7 => "sept",
        8 => "huit",
        9 => "neuf",
        10 => "dix"
    ];

    $number_a_literal = $literals[$number_a];
    $number_b_literal = $literals[$number_b];

    $operations = [
        "+" => "addition",
        "-" => "subtraction",
        "*" => "multiplication"
    ];

    switch (array_rand($operations)) {
        case "+":
            $result = $number_a + $number_b;
            $txt = 'Combien font ' . $number_a_literal . ' plus ' . $number_b_literal . ' ?';
          break;
        case "-":
            $result = $number_a - $number_b;
            $txt = 'Combien font ' . $number_a_literal . ' moins ' . $number_b_literal . ' ?';
          break;
        case "*":
            $result = $number_a * $number_b;
            $txt = 'Combien font ' . $number_a_literal . ' fois ' . $number_b_literal . ' ?';
          break;
    }
    $_SESSION['captcha_result'] = $result;

    $img = imagecreate(270, 17);
    imagecolorallocate($img, 255, 255, 255);
    $textColor = imagecolorallocate($img, 40, 142, 169);
    imagestring($img, 5, 0, 0, $txt, $textColor);
    imagepng($img);
    return sprintf('<img alt="captcha" src="data:image/png;base64,%s"/ width="260">', base64_encode(ob_get_clean()));
}

function redirect($url)
{
    header("Location: $url");
    die();
}

function redirect_self()
{
    // redirect on the same page
    redirect($_SERVER['REQUEST_URI']);
}

function abort_404(): void
{
    http_response_code(404);
    $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
    echo $blade->render("errors.404");
}

function abort_422($message = null)
{
    http_response_code(422);
    die();
}