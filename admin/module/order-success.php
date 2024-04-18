<?php
require "../data/connect.php";
$id = $_GET['id'];
$sql = "DELETE FROM `tbl_info_cart` WHERE id_cart = '$id'";
mysqli_query($conn, $sql);
header("location:?act=order");
