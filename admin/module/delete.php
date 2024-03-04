<?php
require "../data/connect.php";
$id_product = $_GET["id"];
$sql = "DELETE FROM `tbl_product` WHERE product_id = $id_product";
mysqli_query($conn, $sql);
header("location:?act=main");
