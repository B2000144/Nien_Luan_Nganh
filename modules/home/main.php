<?php
$rows_product = mysqli_query($conn, "SELECT * FROM `tbl_product`");
$num_rows = mysqli_num_rows($rows_product);
// số lượng sản phẩn cần hiển thị trên trang
$num_per_page = 8;
// số lượng sản phẩm khi truy vấn ra 
$total_row = $num_rows;
// để dùng vòng lặp for để tính ra số trang được hiển thị
$num_page = ceil($total_row / $num_per_page);
// nếu giá trị mặc định của page = 0(không truyền qua post) thì giá trị mặc định bằng 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
// số bản ghi bắt đầu trên csdl để dùng kết hợp với câu lệnh truy vấn LIMIT
$start = ($page - 1) * $num_per_page;
$result = mysqli_query($conn, "SELECT * FROM `tbl_product` LIMIT {$start}, {$num_per_page}");
$product = mysqli_fetch_all($result, MYSQLI_ASSOC);


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
            <ul class="pagging d-flex">
                <?php if ($page > 1) { ?>
                    <?php $page_prev = $page - 1 ?>
                    <li><a href="?page=<?= $page_prev ?>">Trước</a></li>
                <?php } ?>
                <?php for ($i = 1; $i <= $num_page; $i++) { ?>
                    <li><a href="?page=<?= $i ?>"><?= $i ?></a></li>
                <?php } ?>
                <?php if ($page < $num_page) { ?>
                    <?php $page_next = $page + 1 ?>
                    <li><a href="?page=<?= $page_next ?>">Sau</a></li>
                <?php } ?>
            </ul>
        </div>

    </main>
    <?php get_footer() ?>