<?php
get_header();

?>
<style>
    .header_hotline {
        background-color: #00ADEF;
        color: #fff;
        height: 52px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hotline_phone {
        margin-left: 10px;
    }

    .icon_phone_hotline {
        font-size: 10px;
    }

    .find_product {
        background-color: #272624;
        height: 52px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-image: url(../public/images/banner.jpg);
    }

    .find_product input[name="search"] {
        width: 500px;
        border-radius: 10px;
        border: none;
        height: 35px;
    }

    .find_product input[name="search"]::placeholder {
        padding-left: 20px;
    }

    .find_product button[type="submit"] {
        border: none;
        border-radius: 10px;
        right: 395px;
        top: 13px;
    }
</style>
<div class="text-center">
    <div class="row">
        <div class="col-md-4 header_hotline"><i class="fa-solid fa-phone icon_phone_hotline"></i><span class="hotline_phone">Hotline đặt hàng 0704796583</span></div>
        <div class="col-md-8 find_product position-relative">
            <form action="" method="post">
                <input type="text" name="search" placeholder="tìm kiếm sản phẩm">
                <button type="submit" class="position-absolute"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>