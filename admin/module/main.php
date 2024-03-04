<?php
require "../data/connect.php";
$sql = "SELECT * FROM `tbl_product`";
$rows = mysqli_query($conn, $sql);
$product = mysqli_fetch_all($rows, MYSQLI_ASSOC);
$number = 0;
?>

<p><a href="?act=logout">Đăng xuất</a></p>
<p><a href="?act=uploads">thêm mặt hàng</a></p>
<p><a href="?act=uploads">thêm danh mục sản phẩm</a></p>
<table border="1">
    <?php foreach ($product as $products) : ?>
        <tr>
            <th>Số thứ tự</th>
            <th>Tên sản phẩm</th>
            <th>Mã sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Mô tả sản phẩm</th>
            <th>Chi tiết sản phẩm</th>
            <th>Hình ảnh sản phẩm</th>
            <th>Ngày cập nhật</th>
            <th>trạng thái</th>
        </tr>
        <tr>
            <td><?= $number += 1  ?></td>
            <td><?= $products['name_product'] ?></td>
            <td><?= $products['code_product'] ?></td>
            <td><?= $products['price_product'] ?></td>
            <td><?= $products['desc_product'] ?></td>
            <td><?= $products['detail_product'] ?></td>
            <td><img src="<?= $products['image_product'] ?>" alt="" width="100px"></td>
            <td><?= $products['create_date'] ?></td>
            <td><a href="?act=update&id=<?php echo $products['product_id'] ?>">Sửa</a> | <a onclick="return Del('<?php echo $products['name_product'] ?>')" href="?act=delete&id=<?php echo $products['product_id'] ?>">Xóa</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<script>
    function Del(name) {
        return confirm("bạn có chắc chắn muốn xóa sản phẩm " + name + "?");
    }
</script>