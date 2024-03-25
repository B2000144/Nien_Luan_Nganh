<?php
$code = rand(0, 9999);
if (isset($_POST['btn_submit'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $note = $_POST['note'];
    $sql = "INSERT INTO `tbl_info_cart`( `email_cart`, `name_cart`, `phone_number_cart`, `address_cart`, `note_cart`,`code_order`) VALUES ('$email','$name','$phone_number','$address','$note','$code')";
    if (mysqli_query($conn, $sql)) {
        echo "đặt hàng thành công";
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
    if ($sql) {
        foreach ($_SESSION['cart']['buy'] as $key => $value) {
            $id = $value['id'];
            $qty = $value['qty'];
            $name = $value['name_product'];
            $price = $value['price_product'];
            $sql_order_detail = "INSERT INTO `order_detail`( `product_id`, `order_quantity`, `order_name`, `order_price`, `order_code`) VALUES ('$id','$qty','$name','$price','$code')";
            mysqli_query($conn, $sql_order_detail);
        }
    }
}
unset($_SESSION['cart']);
redirect("?mod=cart&act=thank");
