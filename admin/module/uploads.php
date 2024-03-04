<?php
require "../data/connect.php";

$sql = "SELECT * FROM `category_product`";
$rows = mysqli_query($conn, $sql);
$category = mysqli_fetch_all($rows, MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name_product'];
    $code = $_POST['code_product'];
    $price = $_POST['price_product'];
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
            $sql_insert = "INSERT INTO `tbl_product`(`name_product`, `code_product`, `price_product`, `desc_product`, `detail_product`, `image_product`, `create_date`, `id_category`) 
            VALUES ('$name','$code','$price','$desc','$detail','$path_file','$date', '$selected_category_id')";

            // Thực thi câu lệnh SQL
            if (mysqli_query($conn, $sql_insert)) {
                echo "Thêm mới sản phẩm thành công!";
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

<html>

<body>
    <h1>Form</h1>
    <form action="" enctype="multipart/form-data" method="POST">
        <h2>Tên sản phẩm</h2>
        <input type="text" name="name_product">
        <h2>Mã sản phẩm</h2>
        <input type="text" name="code_product">
        <h2>Giá sản phẩm</h2>
        <input type="text" name="price_product">
        <h2>Mô tả sản phẩm</h2>
        <input type="text" name="desc_product">
        <h2>Chi tiết sản phẩm</h2>
        <textarea name="detail_product" id="" cols="30" rows="10"></textarea>
        <h2>Ngày thêm sản phẩm</h2>
        <input type="date" name="create_date">
        <h2>Hình ảnh</h2>
        <input type="file" name="file"> <br>
        <h2>Danh mục sản phẩm</h2>
        <select name="category" id="category">
            <?php foreach ($category as $cate) : ?>
                <option value="<?= $cate['id_category'] ?>"><?= $cate['category_name'] ?></option>
            <?php endforeach; ?>
        </select><br>
        <input type="submit" value="Thêm mới">
    </form>
    <a href="?act=main">Về trang quản trị