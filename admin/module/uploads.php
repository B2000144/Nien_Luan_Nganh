<?php
require "../data/connect.php";
require "inc/header.php";
require "inc/nav.php";
$sql = "SELECT * FROM `category_product`";
$rows = mysqli_query($conn, $sql);
$category = mysqli_fetch_all($rows, MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name_product'];
    $code = $_POST['code_product'];
    $price = $_POST['price_product'];
    $number = $_POST['number_product'];
    $desc = $_POST['desc_product'];
    $detail = $_POST['detail_product'];
    $date = $_POST['create_date'];

    // Kiểm tra xem file đã được gửi chưa
    if (isset($_FILES['file']) && !empty($_FILES['file']['name'])) {
        $file = $_FILES['file'];
        $file_name = $file['name'];
        $upload_dir = 'public/uploads/';
        $path_file = $upload_dir . $file_name;
        if (move_uploaded_file($file['tmp_name'], $upload_dir . $file_name)) {
            // Lấy giá trị của danh mục sản phẩm từ form
            $selected_category_id = $_POST['category'];

            // Sửa câu lệnh INSERT INTO để bổ sung giá trị cho cột id_categoty
            $sql_insert = "INSERT INTO `tbl_product`(`name_product`, `code_product`, `price_product`,`number_product`, `desc_product`, `detail_product`, `image_product`, `create_date`, `id_category`) 
            VALUES ('$name','$code','$price','$number','$desc','$detail','$path_file','$date', '$selected_category_id')";

            // Thực thi câu lệnh SQL
            if (mysqli_query($conn, $sql_insert)) {
            } else {
                echo "Lỗi: " . mysqli_error($conn);
            }
        } else {
            echo "Lỗi khi tải lên file!";
        }
    } else {
        echo "Vui lòng chọn tệp để tải lên!";
    }
}
?>

<div class="row">
    <?php require "inc/nav_bar.php"; ?>
    <div class="col-md-10 ">
        <h1 class="text-center py-5">Thêm mới mặt hàng</h1>
        <form action="" enctype="multipart/form-data" method="POST">
            <div class="row">
                <div class="col-md-4 input-upload">
                    <span>Tên mặt hàng</span>
                    <input type="text" name="name_product">
                </div>
                <div class="col-md-4 input-upload">
                    <span>Mã hàng</span>
                    <input type="text" name="code_product">
                </div>
                <div class="col-md-4 input-upload">
                    <span>Giá mặt hàng</span>
                    <input type="text" name="price_product">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 input-upload">
                    <span>Số lượng sản phẩm trong kho</span>
                    <input type="text" name="number_product">
                </div>
                <div class="col-md-4 input-upload">
                    <span>Mô tả sản phẩm</span>
                    <input type="text" name="desc_product">
                </div>
                <div class="col-md-4 input-upload">
                    <span>Ngày thêm sản phẩm</span>
                    <input type="date" name="create_date">
                </div>
            </div>
            <div class="row ">
                <span class="input-upload-additional ">Chi tiết sản phẩm</span>
                <div class="col-md-4 input-upload ">
                    <textarea name="detail_product" id="" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div class="row">
                <span class="input-upload-additional">Hình ảnh</span>
                <div class="col-md-4 ">
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
                    <input class="btn btn-primary" type="submit" value="Thêm mới">
                </div>
            </div>
        </form>
    </div>
</div>