<?php
require "data/connect.php";
require "inc/header.php";
require "inc/nav.php";
$code = $_GET['code'];
$sql = "SELECT * FROM `order_detail` WHERE order_code = '$code'";
$row = mysqli_query($conn, $sql);
$detail = mysqli_fetch_all($row, MYSQLI_ASSOC);
$total_order = 0;
// echo "<pre>";
// print_r($detail);
// echo "</pre>";

?>
<div class="row">
    <?php require "inc/nav_bar.php"; ?>
    <div class="col-md-10">
        <p class="title-admin text-center">Đơn hàng</p>
        <table class="admin-main  d-flex justify-content-center align-items-center">
            <tr>
                <th>Tên mặt hàng</th>
                <th>Số lượng</th>
                <th>Giá tiền</th>
            </tr>
            <?php foreach ($detail as $items) : ?>
                <?php $total_order = $total_order + $items['order_price'] ?>
                <tr>
                    <td><?= $items['order_name'] ?></td>
                    <td><?= $items['order_quantity'] ?></td>
                    <td><?= number_format($items['order_price'], 0, ',', '.') . "đ" ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>Tổng đơn hàng</td>
                <td colspan="2"><?= number_format($total_order, 0, ',', '.') . "đ" ?></td>
            </tr>
        </table>
    </div>
</div>