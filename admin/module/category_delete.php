<?php
require "../data/connect.php";
$id = $_GET['id'];
$sql = "DELETE FROM `category_product` WHERE id_category = $id";
mysqli_query($conn, $sql);
header("location:?act=category");
