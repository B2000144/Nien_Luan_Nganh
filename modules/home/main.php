<?php
$sql_product = "SELECT * FROM `tbl_product`";
$rows_product = mysqli_query($conn, $sql_product);
$product = mysqli_fetch_all($rows_product, MYSQLI_ASSOC);

get_header();
get_header_top();
?>
<style>
    .card {
        width: 235px;
        height: 335px;
        border: none;
        overflow: hidden;
    }

    .card_product {
        padding-bottom: 50px;
        padding-top: 50px;
    }

    .code_product {
        opacity: 0.5;
        text-decoration-color: inherit;
    }

    .buy_product {
        background: #00ADEF;
        bottom: -38px;
        transition: ease-in-out 0.25s;
        opacity: 0.9;
    }

    .buy_product input[type="submit"] {
        color: #fff;
    }

    .card:hover .buy_product {
        bottom: 0;

    }

    .card-body a {
        text-decoration: none;
    }


    .price {
        color: #e30e48;
        font-size: 20px;
        font-weight: 500;
    }

    .name_product {
        font-weight: 400;
        color: #000;
        margin-top: 10px;
    }
</style>

<body>
    <?php get_header_bottom() ?>
    <main>
        <div class="container ">
            <div class="row ">
                <?php foreach ($product as $products) : ?>
                    <div class="col-sm-6 col-md-4 col-lg-3 card_product">
                        <div class="card position-relative">
                            <img src="<?php echo "../../admin/" . $products['image_product'] ?>" alt="" class="img_product">
                            <a href="?mod=cart&act=add&id=<?= $products['product_id'] ?>" class="buy_product position-absolute w-100"><input type="submit" value="Thêm vào giỏ hàng" class="btn w-100"></a>
                        </div>
                        <div class="card-body text-start">
                            <a href="?mod=page&act=detail&id=<?= $products['product_id'] ?>">
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