<?php
get_header();
require 'data/connect.php';
$sql_category = "SELECT * FROM `category_product`";
$rows_category = mysqli_query($conn, $sql_category);
$category = mysqli_fetch_all($rows_category, MYSQLI_ASSOC);
?>
<style>
    .navbar-nav {
        position: relative;
    }

    .navbar-right li {
        display: flex;
        justify-content: flex-end;
        align-items: end;
    }



    .navbar-nav .dropdown:hover .dropdown-menu {
        display: block;
    }

    .dropdown-menu :hover .dropdown-item {
        color: #00ADEF;
        background: #fff;
    }

    .nav-link-separate::after {
        content: "";
        display: none;
        position: absolute;
        width: 73px;
        height: 2px;
        background-color: #00ADEF;
        text-align: center;
        bottom: -7px;
    }

    .navbar-nav :hover .nav-link-separate::after {
        display: flex;

    }

    .color-badge {
        color: #fff;
        background-color: #00ADEF;
    }

    .logo-web {
        width: 50px;
    }
</style>
<div class="row header-bottom">
    <div class="col-md-3"><img class="logo-web" src="../public/images/logo_web.png" alt=""></div>
    <div class="col-md-9">
        <nav class="navbar navbar-expand-lg navbar-light bg-white  ">
            <div class="container-fluid justify-content-around">
                <ul class="navbar-nav  navbar-left">
                    <li class="nav-item">
                        <a href="?mod=home&act=main" class="nav-link nav-link-separate">Trang chủ</a>
                    </li>
                    <?php foreach ($category as $item) : ?>
                        <li class="nav-item">

                            <a class="nav-link nav-link-separate" href="?mod=product&act=product_category&id=<?= $item['id_category'] ?>"><?= $item['category_name'] ?></a>
                        </li>
                    <?php endforeach; ?>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item">
                        <a href="?mod=user&act=login" class="nav-link"><i class="fa-regular fa-user"></i>
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo $_SESSION['username']; // Thêm lệnh echo để hiển thị tên người dùng
                            ?>
                        </a>
                    <li class="nav-item">
                        <a href="?mod=user&act=log_out" class="nav-link">đăng xuất</a>
                    </li>
                <?php } else {
                                // Nếu không có người dùng đăng nhập, bạn có thể hiển thị một thông báo khác ở đây
                                echo "Đăng nhập";
                            }
                ?>
                </a>
                </li>
                <li class="nav-item">
                    <button type="button" class=" position-relative border-0 bg-white">
                        <a class="nav-link" href="?mod=cart&act=show"><i class="fa-solid fa-cart-shopping "></i></a>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill color-badge">
                            <?php if (isset($_SESSION['cart'])) {
                                echo $_SESSION['cart']['info']['num_order'];
                            } else {
                                echo 0;
                            }
                            ?>
                        </span>
                    </button>

                </li>
                </ul>

            </div>
        </nav>
    </div>
</div>