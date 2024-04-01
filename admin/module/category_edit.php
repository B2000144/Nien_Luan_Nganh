<?php
require "../data/connect.php";
require "inc/header.php";
require "inc/nav.php";
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
<div class="row">
    <?php require "inc/nav_bar.php"; ?>
    <div class="col-md-8">
        <form action="" method="post">
            <div class="row d-flex justify-content-center align-items-center">
                <label for="" class="title-admin">Thêm danh mục</label><br>
                <div class="col-md-6"><input class="form-input" type="text" value="<?= $category['category_name'] ?>" name="category"></div>
                <div class="col-md-6 "><input type="submit" class="btn btn-primary" name="btn_submit" id="" value="Sửa"></div>
            </div>
        </form>
        <a href="?act=category">quay trở về trang thêm danh mục</a>
    </div>
</div>