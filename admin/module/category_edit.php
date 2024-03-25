<?php
require "../data/connect.php";
$id = $_GET['id'];
$sql = "SELECT * FROM `category_product` WHERE id_category = $id";
$row = mysqli_query($conn, $sql);
$category = mysqli_fetch_assoc($row);
$num = 0;
if (isset($_POST['btn_submit'])) {
    $category = $_POST['category'];
    $sql = "UPDATE `category_product` SET `category_name`='$category' WHERE id_category = $id";
    mysqli_query($conn, $sql);
    echo "đã sửa danh mục thành công";
    header("Location:?act=category");
}
?>
<form action="" method="post">
    <label for="">Sửa danh mục</label><br>
    <input type="text" name="category" value="<?= $category['category_name'] ?>"><br>
    <input type="submit" name="btn_submit" id="" value="Sửa">
</form>
<a href="?act=category">quay trở về trang thêm danh mục</a>