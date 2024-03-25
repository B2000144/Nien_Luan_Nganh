<?php
get_header();
$id = $_GET['id'];
$sql = "SELECT * FROM `tbl_product` WHERE product_id = '$id'";
$row = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($row);
?>
<div class="container">
    <h1><?= $product['name_product'] ?></h1>
    <img src="<?php echo "../../admin/" . $product['image_product'] ?>" alt="">
    <p><?= $product['code_product'] ?></p>
    <p><?= number_format($product['price_product']) . " đ"  ?></p>
    <p><?= $product['desc_product'] ?></p>
    <p><?= $product['detail_product'] ?></p>
    <a href="?mod=cart&act=add&id=<?= $product['product_id'] ?>"><input type="submit" value="Thêm vào giỏ hàng" class="btn btn-primary"></a>
</div>