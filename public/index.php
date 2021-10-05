<?php

use duncan3dc\Laravel\BladeInstance;

require '../bootstrap.php';
require '../vendor/autoload.php';

// Derniers arrivants
$query = pdo()->prepare("SELECT * FROM products ORDER BY created_at DESC LIMIT 6");
$query->execute();
$lastProducts = $query->fetchAll();
// Les adoptés
$query = pdo()->prepare("SELECT * FROM products WHERE sold = 1 LIMIT 6");
$query->execute();
$adoptedProducts = $query->fetchAll();

$query = pdo()->prepare("SELECT * FROM reviews WHERE status = ?");
$query->execute([true]);
$reviews = $query->fetchAll();

// Captcha image
$number_a = random_int(0,10); $number_b = random_int(0,10);
if (!is_post()) {
    $captcha_image = generate_captcha($number_a, $number_b);
}

if (is_post()) {

    $firstname = sanitize($_POST['firstname']);
    $lastname = sanitize($_POST['lastname']);
    $email = sanitize($_POST['email']);
    $content = sanitize($_POST['content']);
    $security = intval(sanitize($_POST['security']));

    if (empty($content) OR empty($security)) {
        flash_warning("Merci de remplir les champs requis");
        $anchor = "reviews";
        save_inputs();
        redirect("/#reviews");
    }

    if ($security != $_SESSION['captcha_result']) {
        flash_warning("Vérifiez la réponse à la question de sécurité");
        $anchor = "reviews";
        save_inputs();
        redirect("/#reviews");
    }

    if (strlen($content) < 20 OR strlen($content) > 350) {
        flash_warning("Votre commentaire doit être compris<br>entre 20 et 350 caractères");
        $anchor = "reviews";
        save_inputs();
        redirect("/#reviews");
    }

    $query = pdo()->prepare("INSERT INTO reviews (reviewer_firstname, reviewer_lastname, reviewer_email, content) VALUES (?, ?, ?, ?)");
    $query->execute([$firstname, $lastname, $email, $content]);

    flash_success("Merci, votre avis a été posté !<br>Il est en attente de modération");
    $anchor = "reviews";
    redirect("/#reviews");
}

$blade = new BladeInstance(BASE_PATH . "/views", BASE_PATH . "/cache/views");
echo $blade->render("sections.static.home", [
    'reviews' => $reviews,
    'anchor' => $anchor ?? null,
    'captcha_image' => $captcha_image,
    'lastProducts' => $lastProducts,
    'adoptedProducts' => $adoptedProducts
]);