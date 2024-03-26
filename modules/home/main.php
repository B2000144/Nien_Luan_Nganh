<?php
$sql = "SELECT * FROM `tbl_product`";
$rows = mysqli_query($conn, $sql);
$product = mysqli_fetch_all($rows, MYSQLI_ASSOC);
get_header();
get_header_top();
?>

<body>
    <?php get_header_botton() ?>
    <main>
        <div class="container">
            <div class="row">
                <?php foreach ($product as $products) : ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card">
                            <img src="<?php echo "../../admin/" . $products['image_product'] ?>" alt="" class="imgcrop">
                            <div class="card-body">
                                <a href="?mod=page&act=detail&id=<?= $products['product_id'] ?>">
                                    <p><?= $products['name_product'] ?></p>
                                </a>
                                <p><?= number_format($products['price_product']) . " đ"  ?></p>
                                <a href="?mod=cart&act=add&id=<?= $products['product_id'] ?>"><input type="submit" value="Thêm vào giỏ hàng" class="btn btn-primary"></a>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
    <?php get_footer() ?>