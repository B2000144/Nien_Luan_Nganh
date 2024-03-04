<?php
session_start();
ob_start();
require "lib/users.php";
$act = !empty($_GET['act']) ? $_GET['act'] : 'main';
$path = "module/{$act}.php";
if (!is_login() && $act != 'login') {
    header("location: ?act=login");
}
if (file_exists($path)) {
    require $path;
    exit();
} else {
    require "../inc/404.php"; // không tồn tại trang
    exit();
}
