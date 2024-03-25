<?php
get_header();
// lấy sản phẩm ra để so sánh với sp có trong csdl
$sql = "SELECT * FROM `tbl_product`";
$row = mysqli_query($conn, $sql);
$products = mysqli_fetch_all($row, MYSQLI_ASSOC);


?>
<form action="?mod=cart&act=update" method="POST">
    <table border="1">
        <?php if (!empty($_SESSION['cart']['buy'])) { ?>

            <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng tiền</th>
            </tr>
            <?php foreach ($_SESSION['cart']['buy'] as $items) : ?>
                <tr>
                    <td><?= $items['name_product'] ?></td>
                    <td> <input type="number" min="1" max="10" value="<?= $items['qty'] ?>" name="qty[<?= $items['id'] ?>]"></td>
                    <td><?= number_format($items['price_product']) . "đ" ?></td>
                    <td><?= number_format($items['sub_total']) . "đ"  ?> <a href="?mod=cart&act=delete&id=<?= $items['id'] ?>"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
            <?php endforeach; ?>
    </table>
    <table>
        <tr>
            <th>Tổng sản phẩm</th>
            <th>Tạm tính</th>
        </tr>
        <tr>
            <td>
                <p><?php echo get_num_order() ?></p>
            </td>
            <td>
                <p><?php echo get_total_order() ?></p>
            </td>
            <td>
                <a href="?mod=cart&act=delete">
                    <p>xóa toàn bộ giỏ hàng</p>
                </a>
            </td>
        </tr>
    </table>
    <input type="submit" name="btn_update" value="Cập nhật giỏ hàng">
    <a href="?mod=cart&act=order">Đặt hàng</a> <br>
<?php } else { ?>
    <p>Không có sản phẩm trong giỏ hàng</p>
<?php } ?>

</form>
<a href="?mod=home&act=main">Quay về trang chủ</a>
<?php get_footer() ?>