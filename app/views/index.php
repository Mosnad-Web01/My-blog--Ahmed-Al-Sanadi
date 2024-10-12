<?php
ob_start(); // Start output buffering

// app/views/index.php
require '../router/Router.php';
require '../config/db.php';
include './layout/header.php';
include './layout/navbar.php';
include '../controllers/UserController.php';
include '../utils/utils.php';


$db = new Database();
$conn = $db->connect();

$router = new Router($conn);


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


?>

<main class="relative">
    <div class="absolute top-0 right-2 flex mt-4 z-50">
        <?php showToastNotifications(); ?>
    </div>

    <?php


    $page = isset($_GET['page']) ? $_GET['page'] : null;
    $router->route($page);
    ?>

</main>

<?php
include './layout/footer.php';


ob_end_flush();
?>