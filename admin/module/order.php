<?php
require "data/connect.php";
require "inc/header.php";
require "inc/nav.php";;
$sql = "SELECT * FROM `tbl_info_cart`";
$row = mysqli_query($conn, $sql);
$order = mysqli_fetch_all($row, MYSQLI_ASSOC);
$num = 0;
?>
<div class="row">
    <?php require "inc/nav_bar.php"; ?>
    <div class="col-md-10">
        <p class="title-admin text-center">Đơn hàng</p>

        <table class="admin-main table table-bordered table-striped  d-flex justify-content-center align-items-center">
            <tr>
                <th>STT</th>
                <th>Tên khách hàng</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>địa chỉ</th>
                <th>Lưu ý của khách hàng</th>
                <th>Mã đơn hàng</th>
                <th>Hình thức thanh toán</th>
                <th>Nơi giao hàng</th>
                <th>Ngày đặt</th>
                <th>Xem chi tiết</th>
                <th>Trạng thái đơn hàng</th>
            </tr>
            <?php foreach ($order as $items) : ?>
                <tr>
                    <td><?= $num += 1 ?></td>
                    <td><?= $items['name_cart'] ?></td>
                    <td><?= $items['phone_number_cart'] ?></td>
                    <td><?= $items['email_cart'] ?></td>
                    <td><?= $items['address_cart'] ?></td>
                    <td><?= $items['note_cart'] ?></td>
                    <td><?= $items['code_order'] ?></td>
                    <td><?= $items['payment'] ?></td>
                    <td><?= $items['location'] ?></td>
                    <td><?= $items['date_created'] ?></td>
                    <td> <a href="?act=order_detail&code=<?= $items['code_order'] ?>"><i class="fa-solid fa-circle-info"></i></a></td>
                    <td><a onclick="return Del('<?= $items['code_order'] ?>')" class="order-admin-success" href="?act=order-success&id=<?= $items['id_cart'] ?>">Hoàn thành</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<script>
    function Del(name) {
        return confirm("bạn có chắc chắn muốn xóa thông tin giao hàng với mã đơn hàng " + name + "?");
    }
</script>