<?php
session_start();
ob_start();
require "data/connect.php";
require "lib/url.php";
require "lib/show_data.php";
require "lib/cart.php";
require "lib/template.php";
$mod = !empty($_GET['mod']) ? $_GET['mod'] : 'home';
$act = !empty($_GET['act']) ? $_GET['act'] : 'main';
$path = "modules/{$mod}/{$act}.php";

if (file_exists($path)) { // hàm kiểm tra tồn tại trang
    require $path;
} else {
    require "inc/404.php"; //không tồn tại trang
}
?>
<div id="main">

</div>
<?php
?>