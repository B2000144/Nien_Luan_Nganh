<?php
require "../data/connect.php";
$sql = "SELECT * FROM `category_product`";
$row = mysqli_query($conn, $sql);
$category = mysqli_fetch_all($row, MYSQLI_ASSOC);
$num = 0;
if (isset($_POST['btn_submit'])) {
    $category_post = $_POST['category'];
    $sql = "INSERT INTO `category_product`(`category_name`) VALUES ('$category_post')";
    mysqli_query($conn, $sql);
    echo "đã thêm danh mục thành công";
    header("location:?act=category");
}
?>
<form action="" method="post">
    <label for="">Thêm danh mục</label><br>
    <input type="text" name="category"><br>
    <input type="submit" name="btn_submit" id="" value="Thêm">
</form>
<?php if (isset($category)) { ?>
    <table border="1">
        <tr>
            <th>STT</th>
            <th>Tên danh mục</th>
            <th>Thao tác</th>
        </tr>
        <?php foreach ($category as $items) : ?>
            <tr>

                <td><?= $num += 1 ?></td>
                <td><?= $items['category_name'] ?></td>
                <td><a href="?act=category_edit&id=<?= $items['id_category'] ?>">sửa<a>|<a a onclick="return Del('<?php echo $items['category_name'] ?>')" href="?act=category_delete&id=<?= $items['id_category'] ?>">xóa</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php } else {
    echo "không tồn tại danh mục hàng hóa";
} ?>
<a href="?act=main">Quay trở lại trang quản trị</a>
<script>
    function Del(name) {
        return confirm(" bạn có chắc chắn muốn danh mục sản phẩm " + name + " ? việc xóa có thể xóa tất cả sản phẩm trong danh mục");
    }
</script>