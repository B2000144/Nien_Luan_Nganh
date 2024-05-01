<?php
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM tbl_product WHERE name_product LIKE '%" . $search . "%'";
    $row = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($row);
    $product = mysqli_fetch_all($row, MYSQLI_ASSOC);
}
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

    /* phân trang */
    .pagging li a {
        text-decoration: none;
        padding: 0 5px;

    }

    .pagging li {
        list-style: none;
        padding: 5px;
    }

    .title-search {
        font-weight: 700;
        padding-top: 10px;
    }

    .text-result {
        display: flex;
        align-items: center;
        border: 1px solid hsla(0, 0%, 44%, .25);
        ;

        border-radius: 40px;
    }

    .main-search {
        background: #FCFBF9;
    }
</style>

<body>
    <?php get_header_bottom() ?>
    <main class="main-search">
        <div class="container ">
            <div class="row ">
                <div class="col-md-12 d-flex justify-content-start align-item-center">
                    <h3 class=" title-search ">Kết quả tìm kiếm </h3>
                    <div class="text-result mx-4"><span>có (<?= $num_rows ?> Kết quả)</span></div>
                </div>
                <?php foreach ($product as $products) : ?>
                    <div class="col-sm-6 col-md-4 col-lg-3 card_product">
                        <div class="card position-relative">
                            <img src="<?php echo "../../admin/" . $products['image_product'] ?>" alt="" class="img_product">
                            <a href="?mod=cart&act=add&id=<?= $products['product_id'] ?>" class="buy_product position-absolute w-100"> <input type="submit" value="Thêm vào giỏ hàng" class="btn w-100"></a>
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
    </main>
    <?php get_footer() ?>