<?php
get_header();
?>

<div class="row">
    <div class="col-md-3">Logo</div>
    <div class="col-md-9">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Hàng mới</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Váy đầm</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Thời trang</a>
                    </li>
                    <li class="nav-item">
                        <a href="?mod=user&act=login" class="nav-link"><i class="fa-regular fa-user"></i>
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

                </ul>
            </div>
        </nav>
    </div>
</div>