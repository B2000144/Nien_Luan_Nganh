<?php
$code = rand(0, 9999);
if (isset($_GET['orderType'])) {
    $payment = $_GET['orderType'];
    $email = $_GET['email'];
    $name = $_GET['name'];
    $phone_number = $_GET['phone_number'];
    $address = $_GET['address'];
    $note = $_GET['note'];
    $location = $_GET['location'];
    $sql = "INSERT INTO `tbl_info_cart`( `email_cart`, `name_cart`, `phone_number_cart`, `address_cart`, `note_cart`, `code_order`, `payment`, `location`) VALUES ('$email','$name','$phone_number','$address','$note','$code','$payment','$location')";
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
unset($_SESSION['cart']['order']);
redirect("?mod=cart&act=thank");
