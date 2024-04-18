<?php
require "../data/connect.php";
require "inc/header.php";
require "inc/nav.php";
// lấy dữ liệu bảng categori
$sql = "SELECT * FROM `category_product`";
$rows = mysqli_query($conn, $sql);
$category = mysqli_fetch_all($rows, MYSQLI_ASSOC);

// lấy dữ liệu bảng product_id
$id_product = $_GET["id"];
$sql = "SELECT * FROM `tbl_product` WHERE product_id = $id_product;";
$rows = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($rows);
// echo "<pre>";
// print_r($product);
// echo "</pre>";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name_product'];
    $code = $_POST['code_product'];
    $price = $_POST['price_product'];
    $desc = $_POST['desc_product'];
    $detail = $_POST['detail_product'];
    $date = $_POST['create_date'];

    // trường hợp người dùng thay ảnh mới
    if ($_FILES['file']['size'] > 0) {
        $file = $_FILES['file'];
        $file_name = $file['name'];
        $upload_dir = 'public/uploads/';
        $path_file = $upload_dir . $file_name;
        move_uploaded_file($file['tmp_name'], $path_file);
    } else {
        $path_file = $product['image_product'];
    }

    // Lấy giá trị của danh mục sản phẩm
    $selected_category_id = $_POST['category'];
    $image_product = $product['image_product'];
    //sql update
    $sql = "UPDATE `tbl_product` SET `name_product`='$name',`code_product`='$code',`price_product`='$price',`desc_product`='$desc',`detail_product`='$detail',`image_product`='$path_file',`create_date`='$date',`id_category`='$selected_category_id' WHERE product_id = $id_product";
    if (mysqli_query($conn, $sql)) {
        header("location:?act=main");
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
    die();
}
?>
<div class="row">
    <?php require "inc/nav_bar.php"; ?>
    <div class="col-md-10 ">
        <h1 class="text-center py-5">Sửa mặt hàng</h1>
        <form action="" enctype="multipart/form-data" method="POST">
            <div class="row">
                <div class="col-md-4 input-upload">
                    <span>Tên mặt hàng</span>
                    <input type="text" name="name_product" value="<?= $product['name_product'] ?>">
                </div>
                <div class="col-md-4 input-upload">
                    <span>Mã hàng</span>
                    <input type="text" name="code_product" value="<?= $product['code_product'] ?>">
                </div>
                <div class="col-md-4 input-upload">
                    <span>Giá mặt hàng</span>
                    <input type="text" name="price_product" value="<?= $product['price_product'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 input-upload">
                    <span>Số lượng sản phẩm trong kho</span>
                    <input type="text" name="number_product" value="<?= $product['number_product'] ?>">
                </div>
                <div class="col-md-4 input-upload">
                    <span>Mô tả sản phẩm</span>
                    <input type="text" name="desc_product" value="<?= $product['desc_product'] ?>">
                </div>
                <div class="col-md-4 input-upload">
                    <span>Ngày thêm</span>
                    <input type="date" name="create_date" value="<?= $product['create_date'] ?>">
                </div>
            </div>
            <div class="row ">
                <span class="input-upload-additional">Chi tiết sản phẩm</span>
                <div class="col-md-4 input-upload ">
                    <textarea name="detail_product" id="" cols="30" rows="10"><?= $product['detail_product'] ?></textarea>
                </div>
            </div>
            <div class="row">
                <span class="input-upload-additional ">Hình ảnh</span>
                <div class="col-md-4 ">
                    <img src="<?= $product['image_product'] ?>" alt="" width="200px">
                    <input type="file" name="file"> <br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 input-upload">
                    <span>Danh mục sản phẩm</span>
                    <select name="category" id="category">
                        <?php foreach ($category as $cate) : ?>
                            <option value="<?= $cate['id_category'] ?>"><?= $cate['category_name'] ?></option>
                        <?php endforeach; ?>
                    </select><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <input class="btn btn-primary" type="submit" value="Cập nhật">
                </div>
            </div>




        </form>
    </div>
</div>