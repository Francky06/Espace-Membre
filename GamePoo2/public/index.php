<?php
require_once '../vendor/autoload.php';


if(isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'home';
}


$db = new App\Database();
$db->getPdo(); 



ob_start();
if($p === 'home') {
    require '../pages/home.php';
} else if($p === 'single') {
    require '../pages/single.php';
}
$content = ob_get_clean();
require '../pages/templates/default.php';