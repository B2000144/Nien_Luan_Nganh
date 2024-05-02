<?php
get_header();
get_header_top();
get_header_bottom();
$request = $_GET['request'];
if ($request == 'false') {
    $error = 'Bạn cần phải đăng nhập tài khoản để mua hàng';
}

?>
<style>
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

    .total-pay {
        color: #e30e48;
        font-weight: 700;
    }

    /* css mới */
    .main {
        background-color: #FCFBF9;
    }

    .image-order {
        width: 50px;
        height: 75px;
    }

    .name-product-order {
        font-size: 13px;
        font-weight: 500;
    }

    .number_order {
        top: 57px;
        right: 120px;
    }

    /* form */
    .title-order {
        font-size: 25px;
        font-weight: 700;
        padding: 20px 0;
    }

    .form-input {
        width: 100%;
        appearance: none;
        height: 50px;
        border: 1px solid hsla(0, 0%, 44%, .25);
        border-radius: 20px;
        transition: all .25s linear;
        margin: 20px 0;

    }

    .form-input:focus {
        border: 1px solid #72C9D9;
    }

    .block-top,
    .block-between,
    .block-bottom {
        background-color: #FFF;
        padding: 20px 20px;
        margin-bottom: 40px;
    }

    .select-address {
        padding-right: 20px;
    }

    .logo_payment {
        width: 50px;
        margin: 10px 20px 0;
    }
</style>
<div class="main">
    <div class="container">
        <h1 class="text-start pb-5 ">Thanh toán</h1>
        <div class="row">
            <div class="col-md-8 text-start d-block">
                <form action="?mod=cart&act=payment" method="POST">
                    <div class="block-top">
                        <div class="row">
                            <span class="error py-2 fs-5"><?= $error ?></span>
                            <div class="col-md-6">
                                <span class="title-order">Địa chỉ giao hàng</span>
                            </div>
                            <div class="col-md-6">
                                <span>bạn đã có tài khoản? <a href="?mod=user&act=login">Đăng nhập ngay</a></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-input " type="text" name="name" placeholder="Họ và tên">
                            </div>
                            <div class="col-md-6 text-end">
                                <input class="form-input" type="text" name="phone_number" placeholder="số điện thoại">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input class="form-input" type="email" name="email" placeholder="example@gmail.com">
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="address" id="" placeholder="Địa chỉ chi tiết" class="form-input">
                        </div>
                        <div class="col-md-12 d-flex">
                            <div class="form-check select-address">
                                <input class="form-check-input " value="nhà riêng" type="radio" name="location" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    nhà riêng
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" value="công ty" type="radio" name="location" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    công ty
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="block-between">
                        <div class="row">
                            <div class="col-md-12 py-5">
                                <span class="title-order">Hỗ trợ khách hàng</span>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-input" name="note" id="" cols="10" rows="10" placeholder="Ghi chú"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="block-bottom">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12 py-5">
                                    <span class="title-order">Phương thức thanh toán</span>
                                </div>
                                <div class="form-check select-address d-flex align-items-center justify-content-start">
                                    <input class="form-check-input " value="cod" type="radio" name="payment" id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        <img src="https://gumac.vn/static/media/ic_cod.827610bcc90a3e2b5610ecd69e070d79.svg" class="logo_payment logo_momo" alt=""> Thanh toán khi nhận hàng
                                    </label>
                                </div>
                                <div class="form-check d-flex align-items-center justify-content-start">
                                    <input class="form-check-input" value="momo" type="radio" name="payment" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        <img src="https://gumac.vn/static/media/ic_momo.7f3f4f55668324751b5f33ff9b8eddb4.svg" class="logo_payment logo_momo" alt="">Thanh toán bằng ví momo
                                    </label>
                                </div>
                                <div class="form-check d-flex align-items-center justify-content-start">
                                    <input class="form-check-input" value="momo-atm" type="radio" name="payment" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        <img src="../../public/images/download-logo-napas-mien-phi.jpg" alt="" class="logo_payment logo_momo_atm"> Thanh toán qua momo ATM
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header cart-header-info text-start">
                        <span>Thông tin đơn hàng</span>
                    </div>
                    <div class="card-body cart-info-body">
                        <div class="row ">
                            <?php if (!empty($_SESSION['cart']['buy'])) { ?>
                                <?php foreach ($_SESSION['cart']['buy'] as $items) : ?>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row pb-4 position-relative">
                                                <div class="col-md-4 text-start">
                                                    <img class="image-order rounded" src="<?php echo "../../admin/" . $items['image_product'] ?>" alt="">
                                                </div>
                                                <div class="col-md-7 text-start d-flex align-items-center">
                                                    <span class="name-product-order"><?= $items['name_product'] ?></span>
                                                </div>
                                                <div class="col-md-1 ">
                                                    <span class="number_order position-absolute">
                                                        <span>x</span><?php if ($items['qty'] < 10) {
                                                                            echo " " . 0  . $items['qty'];
                                                                        } else {
                                                                            echo " " . $items['qty'];
                                                                        }  ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-end ">
                                            <span class="price-cart"><?= number_format($items['sub_total']) . "đ"  ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <div class="row ">
                                    <div class="col-md-6">
                                        <span class="d-block text-start py-3">Tổng tiền sản phẩm</span>
                                    </div>
                                    <div class="col-md-6 ">
                                        <span class="d-block text-end py-3"><?php echo number_format(get_total_order())  . "đ" ?></span>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php if (isset($_SESSION['cart'])) { ?>
                        <div class="card-footer cart-info-footer">
                            <div class="row">
                                <div class="col-md-6 text-start"><span>Tổng thanh toán</span></div>
                                <div class="col-md-6 text-end total-pay">
                                    <span><?php echo number_format(get_total_order())  . "đ" ?></span>
                                </div>
                                <div class="col-md-12 "><button type="submit" name="btn_submit" class="btn btn-dark mt-5 w-100">Thanh toán</button></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<?php get_footer() ?>