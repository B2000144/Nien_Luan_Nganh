<?php
require('../Nien_Luan_Nganh/admin/MailPHP/sendMail.php');
$code = rand(0, 9999);
$date = date('Y-m-d H:i:s');
$name = $_SESSION['username'];
if (isset($_GET['orderType'])) {
    $payment = $_GET['orderType'];
    $email = $_GET['email'];
    $name = $_GET['name'];
    $phone_number = $_GET['phone_number'];
    $address = $_GET['address'];
    $note = $_GET['note'];
    $location = $_GET['location'];
    $sql = "INSERT INTO `tbl_info_cart`( `email_cart`, `name_cart`, `phone_number_cart`, `address_cart`, `note_cart`, `code_order`, `payment`, `location`,`date_created`) VALUES ('$email','$name','$phone_number','$address','$note','$code','$payment','$location','$date')";
    if (mysqli_query($conn, $sql)) {
        // echo "đặt hàng thành công";
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
    foreach ($_SESSION['cart']['buy'] as $key => $value) {
        $id = $value['id'];
        $qty = $value['qty'];
        $sql_update_product = "UPDATE `tbl_product` SET `number_product` = `number_product` - $qty WHERE product_id = $id";
        if (!mysqli_query($conn, $sql_update_product)) {
            echo "Lỗi khi cập nhật số lượng sản phẩm: " . mysqli_error($conn);
        }
    }
    $title = "Cảm ơn bạn đã đặt hàng tại BrandShop";
    $content = "<h2>Xin chào {$_SESSION['username']}</h2>";
    $content .= "<h4>Thông tin đơn hàng</h4>";
    $content .= "<hr>";
    $content .= "<p>mã đơn hàng của bạn là:$code</p> ";
    $content .= "<table border='1'>
    <tr>
        <th>Tên mặt hàng</th>
        <th>Số lượng</th>
        <th>Giá tiền</th>
    </tr>";
    foreach ($_SESSION['cart']['buy'] as $key => $value) {
        $total_order = $total_order + $value['price_product'];
        $content .= "
        <tr>
            <td>{$value['name_product']}</td>
            <td>{$value['qty']}</td>
            <td>" . number_format($value['price_product'], 0, ',', '.') . 'đ' . "</td>
        </tr>";
    }
    $content .= "
    <tr>
    <td>Tổng đơn hàng</td>
    <td colspan='2'>" . number_format($total_order, 0, ',', '.') . 'đ' . "</td>

    </tr>
    ";
    $content .= "</table>";
    $content .= "<hr>";
    $content .= "<h4>Thông tin giao hàng</h4>";
    $content .= "<p>Số điện thoại: $phone_number</p>";
    $content .= "<p>Email: $email</p>";
    $content .= "<p>địa chỉ giao hàng: $address</p>";
    $content .= "<hr>";
    $content .= "<h4>Quý khách có thể phản hồi với shop qua các phương thức sau </h4>";
    $content .= "<p>Email: phamhuutritestmail@gmail.com</p>";
    $content .= "<p>Điện thoại: 0704796583</p>";
    $content .= "<p>Trang Facebook: facebook.com/profile.php?id=61557692851102</p>";
    $sendMail =  $_SESSION['email'];
    
    $mail = new Mailer;
    $mail->sendMail($title, $content, $sendMail);
}
unset($_SESSION['cart']);
unset($_SESSION['cart']['order']);
redirect("?mod=cart&act=thank");
?>
<hr>