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
<main class="relative   flex flex-col justify-between h-screen">
    <div class="absolute top-8 right-8  flex z-50">
        <?php showToastNotifications(); ?>
    </div>

    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : null;
    $router->route($page);

    include './layout/footer.php';
    ?>
</main>

<?php

ob_end_flush(); // End output buffering and flush output
?>