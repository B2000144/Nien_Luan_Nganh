<?php
require "data/connect.php";
$code = $_GET['code'];
$sql = "SELECT * FROM `order_detail` WHERE order_code = '$code'";
$row = mysqli_query($conn, $sql);
$detail = mysqli_fetch_array($row, MYSQLI_ASSOC);
echo "<pre>";
print_r($detail);
echo "</pre>";
