<?php
require "data/connect.php";
require "inc/header.php";
require "inc/nav.php";;
$sql = "SELECT * FROM `tbl_info_cart`";
$row = mysqli_query($conn, $sql);
$order = mysqli_fetch_all($row, MYSQLI_ASSOC);
// echo "<pre>";
// print_r($order);
// echo "</pre>";
?>
<div class="row">
    <?php require "inc/nav_bar.php"; ?>
    <div class="col-md-8">
        <p class="title-admin">Đơn hàng</p>
        <table>
            <tr>
                <th>Tên khách hàng</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>địa chỉ</th>
                <th>Lưu ý của khách hàng</th>
                <th>Mã đơn hàng</th>
                <th>Hình thức thanh toán</th>
                <th>Nơi giao hàng</th>
                <th>Xem chi tiết</th>
            </tr>
            <tr>
                <?php foreach ($order as $items) : ?>
                    <td><?= $items['name_cart'] ?></td>
                    <td><?= $items['phone_number_cart'] ?></td>
                    <td><?= $items['email_cart'] ?></td>
                    <td><?= $items['address_cart'] ?></td>
                    <td><?= $items['note_cart'] ?></td>
                    <td><?= $items['code_order'] ?></td>
                    <td><?= $items['payment'] ?></td>
                    <td><?= $items['location'] ?></td>
                    <td> <a href="?act=order_detail&code=<?= $items['code_order'] ?>"><i class="fa-solid fa-circle-info"></i></a></td>
                <?php endforeach; ?>

            </tr>
        </table>
    </div>
</div>