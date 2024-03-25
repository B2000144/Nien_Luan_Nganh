<?php
$sql = "SELECT * FROM `tbl_product`";
$rows = mysqli_query($conn, $sql);
$product = mysqli_fetch_all($rows, MYSQLI_ASSOC);
get_header();
?>

<body>
    <header>
        <nav class="navbar navbar-expand-sm bg-light">

            <div class="container-fluid">
                <!-- Links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?mod=cart&act=show"><i class="fa-solid fa-cart-shopping "></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="?mod=user&act=login"><i class="fa-regular fa-user"></i>
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo $_SESSION['username']; // Thêm lệnh echo để hiển thị tên người dùng
                            ?>
                                <a href="?mod=user&act=log_out"><i class=""></i>đăng xuất</a>
                            <?php } else {
                                // Nếu không có người dùng đăng nhập, bạn có thể hiển thị một thông báo khác ở đây
                                echo "Đăng nhập";
                            }
                            ?>
                        </a>
                    </li>

                    <li class="nav-item">

                    </li>
                </ul>
            </div>

        </nav>
    </header>
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