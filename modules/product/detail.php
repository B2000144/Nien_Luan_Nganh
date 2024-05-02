<?php
get_header();
get_header_top();
get_header_bottom();
// lay san pham theo id
$id = $_GET['id'];
$sql = "SELECT * FROM `tbl_product` WHERE product_id = '$id'";
$row = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($row);
// lay ten danh mục
$id_category = $product['id_category'];
$sql_cate = "SELECT * FROM `category_product`WHERE id_category = '$id_category'";
$row_cate = mysqli_query($conn, $sql_cate);
$category = mysqli_fetch_assoc($row_cate);
// lay danh sach san pham theo danh muc
$sql_category_product = "SELECT * FROM `tbl_product` WHERE id_category = '$id_category'";
$row_category_product = mysqli_query($conn, $sql_category_product);
$product_category = mysqli_fetch_all($row_category_product, MYSQLI_ASSOC);
?>
<link rel="stylesheet" href="../../public/css/product.css">
<link rel="stylesheet" href="../../public/css/detail.css">
<div class="main-detail">


    <div class="container ">
        <div class="row pt-5">
            <div class="col-md-6 img-detail">
                <img src="<?php echo "../../admin/" . $product['image_product'] ?>" alt="">
            </div>
            <div class="col-md-6 information-detail">
                <div class="row">
                    <div class="col-md-12 name-product-detail">
                        <p class="text-start"><?= $product['name_product'] ?></p>
                    </div>
                    <div class="col-md-3 code-product-detail d-flex justify-content-between">
                        <p><?= $product['code_product'] ?></p>
                        <p>|</p>
                    </div>
                    <div class="col-md-4 d-flex  justify-content-center">
                        <span class="status-detail">Tình Trạng: </span>
                        <p><?php if ((int)$product['number_product'] > 0) { ?>
                                <span class="enough-detail">Còn hàng</span>
                            <?php } else { ?>
                                <span class="lack-detail">Hết hàng</span>
                            <?php } ?>
                        </p>
                    </div>
                    <div class="col-md-8 text-start price-product-detail">
                        <p><?= number_format($product['price_product']) . " đ"  ?></p>
                        <p class="text-success">Số lượng trong kho: <?= $product['number_product']  ?></p>
                    </div>
                    <div class="col-md-12 text-start py-3">
                        <a href="?mod=cart&act=add&id=<?= $product['product_id'] ?>"><button type="submit" class="btn btn-dark"><i class="fa-solid fa-cart-plus"></i><span class="add-cart-detail">Thêm vào giỏ hàng</span></button></a>
                    </div>
                    <div class="col-md-12 text-start border-bottom pb-2"><span class="category-detail">Danh mục:</span><span class="category-name-detail"><?= $category['category_name'] ?></span></div>
                    <div class="col-md-12 text-start ">
                        <p class="pt-5 outstanding-detail">Đặc điểm nổi bậc</p>
                        <p class="lh-lg"><?= $product['desc_product'] ?></p>
                    </div>
                    <div class="col-md-12 text-start">
                        <p class="pt-5 outstanding-detail">chi tiết sản phẩm</p>
                        <p class="lh-lg"><?= $product['detail_product'] ?></p>
                    </div>
                </div>
            </div>
            <div class="related-product">
                <h2 class="text-start py-5">Gợi ý dành cho bạn</h2>
                <div class="container main-product_category ">
                    <div class="row ">
                        <?php foreach ($product_category as $products) : ?>
                            <div class="col-sm-6 col-md-4 col-lg-3 card_product">
                                <div class="card position-relative">
                                    <img src="<?php echo "../../admin/" . $products['image_product'] ?>" alt="" class="img_product">
                                    <a href="?mod=cart&act=add&id=<?= $products['product_id'] ?>" class="buy_product position-absolute w-100"><input type="submit" value="Thêm vào giỏ hàng" class="btn w-100"></a>
                                </div>
                                <div class="card-body text-start">
                                    <a href="?mod=product&act=detail&id=<?= $products['product_id'] ?>">
                                        <p class="name_product"><?= $products['name_product'] ?></p>
                                    </a>
                                    <p class="code_product"><?= $products['code_product'] ?></p>
                                    <p class="price"><?= number_format($products['price_product']) . " đ"  ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>