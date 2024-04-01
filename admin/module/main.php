<?php
require "../data/connect.php";
require "inc/header.php";
require "inc/nav.php";
$sql = "SELECT * FROM `tbl_product`";
$rows = mysqli_query($conn, $sql);
$product = mysqli_fetch_all($rows, MYSQLI_ASSOC);
$number = 0;

?>


<div class="row">
    <?php require "inc/nav_bar.php"; ?>
    <div class="col-md-8">
        <div class="d-flex justify-content-between pt-5">
            <p class="title-admin">Danh sách sản phẩm</p>
            <button class="btn btn-primary add-product-admin"><a class="text-white text-decoration-none" href="?act=uploads">Thêm</a></button>
        </div>

        <table class="admin-main">
            <tr>
                <th>Số thứ tự</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh sản phẩm</th>
                <th>Mã sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Ngày thêm</th>
                <th>trạng thái</th>
            </tr>
            <?php foreach ($product as $products) : ?>
                <tr>
                    <td><?= $number += 1  ?></td>
                    <td><?= $products['name_product'] ?></td>
                    <td><img src="<?= $products['image_product'] ?>" alt="" width="100px"></td>
                    <td><?= $products['code_product'] ?></td>
                    <td><?= $products['price_product'] ?></td>

                    <td><?= $products['create_date'] ?></td>
                    <td><a href="?act=update&id=<?php echo $products['product_id'] ?>">Sửa</a> | <a onclick="return Del('<?php echo $products['name_product'] ?>')" href="?act=delete&id=<?php echo $products['product_id'] ?>">Xóa</a></td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>
</div>
<script>
    function Del(name) {
        return confirm("bạn có chắc chắn muốn xóa sản phẩm " + name + "?");
    }
</script>