<?php
?>
<h1>Thanh toán</h1>
<form action="?mod=cart&act=check_out" method="POST">
    <h3>1. Địa chỉ nhận hàng</h3>
    <label for="">Địa chỉ Email</label>
    <input type="email" name="email" placeholder="example@gmail.com"><br>
    <label for="">Họ và tên</label>
    <input type="text" name="name" placeholder="Họ và tên"><br>
    <label for="">Số điện thoại</label>
    <input type="text" name="phone_number" placeholder="số điện thoại"><br>
    <label for="">Địa chỉ</label>
    <input type="text" name="address" id=""><br>
    <label for="">Ghi chú</label><br>
    <textarea name="note" id="" cols="30" rows="10" placeholder="Ghi chú"></textarea><br>
    <input type="submit" value="đặt hàng" name="btn_submit">
</form>

<form action="?mod=pay&act=pay_infomation" method="POST" enctype="application/x-www-form-urlencoded">
    <input type="submit" value="Thanh toán MOMO QRcode">
</form>
<form action="?mod=pay&act=payment_atm" method="POST" enctype="application/x-www-form-urlencoded">
    <input type="submit" value="Thanh toán qua MOMO ATM">
</form>