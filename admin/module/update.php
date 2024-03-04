<?php
require "../data/connect.php";

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
        echo "Sửa sản phẩm thành công!";
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
    die();
}
?>

<html>

<body>
    <h1>Form</h1>
    <form action="" enctype="multipart/form-data" method="POST">
        <h2>Tên sản phẩm</h2>
        <input type="text" name="name_product" value="<?= $product['name_product'] ?>">
        <h2>Mã sản phẩm</h2>
        <input type="text" name="code_product" value="<?= $product['code_product'] ?>">
        <h2>Giá sản phẩm</h2>
        <input type="text" name="price_product" value="<?= $product['price_product'] ?>">
        <h2>Mô tả sản phẩm</h2>
        <input type="text" name="desc_product" value="<?= $product['desc_product'] ?>">
        <h2>Chi tiết sản phẩm</h2>
        <textarea name="detail_product" id="" cols="30" rows="10"><?= $product['desc_product'] ?></textarea>
        <h2>Ngày thêm sản phẩm</h2>
        <input type="date" name="create_date" value="<?= $product['create_date'] ?>">
        <h2>Hình ảnh</h2>
        <img src="<?= $product['image_product'] ?>" alt="" width="200px">
        <input type="file" name="file"> <br>
        <h2>Danh mục sản phẩm</h2>
        <select name="category" id="category">
            <?php foreach ($category as $cate) : ?>
                <option value="<?= $cate['id_category'] ?>" <?= $cate['id_category'] == $product['id_category'] ? 'selected' : '' ?>>
                    <?= $cate['category_name'] ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        <input type="submit" value="Cập nhật">
    </form>
    <a href="?act=main">Về trang quản trị</a>
</body>

</html>