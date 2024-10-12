<?php
 //my-blog/index.php

    $url = trim($_SERVER['REQUEST_URI'], '/');
    if ($url === '' || $url === 'my-blog') {
        header("Location: /my-blog/app/views/index?page=home");
        die();

    }

