<?php
get_header();
get_header_top();
get_header_bottom();
$id = $_GET['id'];
$sql = "SELECT * FROM `tbl_product` WHERE product_id = '$id'";
$row = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($row);
$id_category = $product['id_category'];
$sql_cate = "SELECT * FROM `category_product`WHERE id_category = '$id_category'";
$row_cate = mysqli_query($conn, $sql_cate);
$category = mysqli_fetch_assoc($row_cate);
?>
<style>
    .main-detail {
        background-color: #FCFBF9;
    }



    .img-detail img {
        width: 600px;

    }

    .name-product-detail p {
        font-size: 30px;
        font-weight: 700;
    }

    .code-product-detail {
        font-size: 15px;
        font-weight: 400;
        color: (37, 36, 37, .5);
    }

    .status-detail {
        padding-right: 10px;
    }

    .enough-detail {
        color: #127daf;
    }

    .lack-detail {
        color: #e30e48;
    }

    .price-product-detail p {
        color: #e30e48;
        font-weight: 700;
    }

    .add-cart-detail {
        padding-left: 10px;
    }

    .category-name-detail {
        color: #127daf;
        margin-left: 10px;
    }

    .outstanding-detail {
        font-weight: 700;
        font-size: 20px;
    }
</style>
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
                    <div class="col-md-12 text-start price-product-detail">
                        <p><?= number_format($product['price_product']) . " đ"  ?></p>
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

        </div>
    </div>
</div>
<?php get_footer() ?>