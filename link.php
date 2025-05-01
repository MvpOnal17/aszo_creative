<?php
@$page = $_GET['q'];
if (!empty($page)) {
    switch ($page) {


        case 'home':
            include './pages/home/home.php';
            break;
    }
} else {
    include './pages/home/home.php';
}