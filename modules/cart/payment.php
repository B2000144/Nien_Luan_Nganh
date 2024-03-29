<?php
if (isset($_POST['btn_submit'])) {
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $note = $_POST['note'];
    $payment = $_POST['payment'];
    if ($_POST['payment'] == 'cod') {
        redirect("?mod=cart&act=check_out&orderType=cod&name=$name&phone_number=$phone_number&email=$email&address=$address&location=$location&note=$note");
    } else if ($_POST['payment'] == 'momo') {
        redirect("?mod=pay&act=pay_infomation");
    } else {
        redirect("?mod=pay&act=payment_atm");
    }
    $_SESSION['cart']['order'] = array(
        'name' => $name,
        'phone_number' => $product['price_product'],
        'address' => $address,
        'location' => $location,
        'note' => $note,
    );
}
if (isset($_GET['orderType'])) {
    if ($_GET['orderType'] == 'momo_wallet') {
        $name = $_SESSION['cart']['order']['name'];
        $phone_number = $_SESSION['cart']['order']['phone_number'];
        $email = $_SESSION['cart']['order']['ẹmail'];
        $address = $_SESSION['cart']['order']['address'];
        $location = $_SESSION['cart']['order']['location'];
        $note = $_SESSION['cart']['order']['note'];
        redirect("?mod=cart&act=check_out&orderType=momo_wallet&name=$name&phone_number=$phone_number&email=$email&address=$address&location=$location&note=$note");
    }
}
