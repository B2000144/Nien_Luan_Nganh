<?php
get_header();
get_header_top();
get_header_bottom();
// lấy sản phẩm ra để so sánh với sp có trong csdl
$sql = "SELECT * FROM `tbl_product`";
$row = mysqli_query($conn, $sql);
$products = mysqli_fetch_all($row, MYSQLI_ASSOC);


?>
<style>
    .title-cart {
        font-size: 30px;
        font-weight: 700;
    }

    .image_cart {
        width: 90px;
        height: 125;
    }

    .cart-table-body {
        padding-bottom: 30px;
        padding-top: 30px;
        border-top: 1px solid #E6E5E4;

    }

    .cart-table-header {
        padding-bottom: 30px;
    }

    .cart-header-info {
        padding: 30px 0;
        background-color: #72C9D9;
    }

    .cart-header-info span {
        margin-left: 30px;
        color: #399CC1;
        font-weight: 700;
    }

    .cart-info-body,
    .cart-info-footer {
        background-color: #EBF4F5;
        padding: 30px 30px;
    }

    .price-cart {
        font-size: 20px;
        font-weight: 600;
    }

    .text-delete-cart {
        padding-left: 10px;
        font-weight: 400;
        color: #000;


    }

    .delete-product:hover .text-delete-cart {
        color: #00ADEF;
    }

    .total-pay {
        color: #e30e48;
        font-weight: 700;
    }
</style>
<div class="container">
    <p class="text-start pb-5 title-cart">Giỏ hàng</p>
    <div class="row cart-left">
        <div class="col-md-8">
            <form action="?mod=cart&act=update" method="POST">
                <div class="row cart-table-header">
                    <div class="col-md-3 fw-bold">Thông tin sản phẩm</div>
                    <div class="col-md-3 fw-bold">Đơn giá</div>
                    <div class="col-md-3 fw-bold">Số lượng</div>
                    <div class="col-md-3 fw-bold">Tổng cộng</div>
                </div>
                <?php if (!empty($_SESSION['cart']['buy'])) { ?>
                    <?php foreach ($_SESSION['cart']['buy'] as $items) : ?>
                        <div class="row cart-table-body">
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-6"><img class="image_cart" src="<?php echo "../../admin/" . $items['image_product'] ?>" alt=""></div>
                                    <div class="col-md-6 text-start d-flex align-items-center"><?= $items['name_product'] ?></div>
                                </div>
                            </div>
                            <div class="col-md-3 fw-bold d-flex align-items-center justify-content-center"><span class="price-cart"><?= number_format($items['price_product']) . "đ" ?></span></div>
                            <div class="col-md-3 d-flex align-items-center justify-content-center"><input type="number" min="1" max="10" value="<?= $items['qty'] ?>" name="qty[<?= $items['id'] ?>]"></div>
                            <div class="col-md-3 fw-bold d-flex align-items-center justify-content-center"><span class="price-cart"><?= number_format($items['sub_total']) . "đ"  ?></span> <a class="text-decoration-none delete-product" href="?mod=cart&act=delete&id=<?= $items['id'] ?>"><span class="text-delete-cart">xóa</span> </a></div>
                        </div>
                    <?php endforeach; ?>

                    <div class="row">
                        <div class="col-md-6 text-start "><input class="btn btn-primary" type="submit" name="btn_update" value="Cập nhật giỏ hàng"></div>
                        <div class="col-md-6 text-end"><button class="btn btn-danger">
                                <a href="?mod=cart&act=delete" class="text-decoration-none text-white">
                                    xóa toàn bộ giỏ hàng
                                </a>
                            </button></div>
                        <div class="col-md-12  text-start pt-5">
                            <i class="fa-solid fa-arrow-left"></i> <a href="?mod=home&act=main" class="text-decoration-none text-dark">Tiếp tục mua hàng</a>
                        </div>
                    </div>
                <?php } else { ?>
                    <p>Không có sản phẩm trong giỏ hàng</p>
                <?php } ?>
            </form>
        </div>
        <?php if (isset($_SESSION['cart'])) { ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header cart-header-info text-start">
                        <span>Thông tin đơn hàng</span>
                    </div>
                    <div class="card-body cart-info-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <span class="d-block text-start pb-3">Tổng tiền sản phẩm</span>
                                <span class="d-block text-start">Tổng số lượng</span>
                            </div>
                            <div class="col-md-6 ">
                                <span class="d-block text-end pb-3"><?php echo number_format(get_total_order())  . "đ" ?></span>
                                <span class="d-block text-end"><?php echo get_num_order() ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer cart-info-footer">
                        <div class="row">
                            <div class="col-md-6 text-start"><span>Tổng thanh toán</span></div>
                            <div class="col-md-6 text-end total-pay"><span><?php echo number_format(get_total_order())  . "đ" ?></span></div>
                            <div class="col-md-12 "><button class="btn btn-dark mt-5"><a href="?mod=cart&act=order" class="text-decoration-none text-white">Đặt hàng ngay</a> <br></button></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

</div>

<?php get_footer() ?>