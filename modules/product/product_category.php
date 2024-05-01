<?php
$id = $_GET['id'];
$sql = "SELECT * FROM `tbl_product` WHERE id_category = '$id'";
$row = mysqli_query($conn, $sql);
$product = mysqli_fetch_all($row, MYSQLI_ASSOC);
get_header();
get_header_top();
?>
<link rel="stylesheet" href="../../public/css/product.css">

<body>
    <?php get_header_bottom() ?>
    <main id="main_product_category">
        <div class="container main-product_category ">
            <div class="row ">
                <?php foreach ($product as $products) : ?>
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
    </main>
    <?php get_footer() ?>