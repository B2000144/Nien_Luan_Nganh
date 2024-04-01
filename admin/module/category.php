<?php
require "../data/connect.php";
require "inc/header.php";
require "inc/nav.php";
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
<div class="row">
    <?php require "inc/nav_bar.php"; ?>
    <div class="col-md-8">
        <form action="" method="post">
            <div class="row d-flex justify-content-center align-items-center">
                <label for="" class="title-admin">Thêm danh mục</label><br>
                <div class="col-md-6"><input class="form-input" type="text" name="category"></div>
                <div class="col-md-6 "><input type="submit" class="btn btn-primary" name="btn_submit" id="" value="Thêm"></div>
            </div>
        </form>

        <?php if (isset($category)) { ?>
            <table class="tabel-category">
                <tr>
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    <th>Thao tác</th>
                </tr>
                <?php foreach ($category as $items) : ?>
                    <tr>

                        <td><?= $num += 1 ?></td>
                        <td><?= $items['category_name'] ?></td>
                        <td><a class="pe-2 text-primary" href="?act=category_edit&id=<?= $items['id_category'] ?>"><i class="fa-solid fa-pen-to-square"></i><a>|<a a onclick="return Del('<?php echo $items['category_name'] ?>')" class=" ps-2 text-danger" href="?act=category_delete&id=<?= $items['id_category'] ?>"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php } else {
            echo "không tồn tại danh mục hàng hóa";
        } ?>
    </div>
</div>
<script>
    function Del(name) {
        return confirm(" bạn có chắc chắn muốn danh mục sản phẩm " + name + " ? việc xóa có thể xóa tất cả sản phẩm trong danh mục");
    }
</script>