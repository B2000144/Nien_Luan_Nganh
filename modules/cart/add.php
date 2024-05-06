<?php
$id = $_GET['id'];
$sql = "SELECT * FROM `tbl_product` WHERE product_id = $id";
$row =  mysqli_query($conn, $sql);
if ($row && mysqli_num_rows($row) > 0) {
    $product = mysqli_fetch_assoc($row);
    if ($product['number_product'] > 0) {
        $qty = 1;
        if (isset($_SESSION['cart']) && isset($_SESSION['cart']['buy']) && is_array($_SESSION['cart']['buy'])) {
            if (array_key_exists($id, $_SESSION['cart']['buy'])) {
                $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
            }
        } else {
            $_SESSION['cart']['buy'] = array();
        }

        $_SESSION['cart']['buy'][$id] = array(
            'id' => $product['product_id'],
            'name_product' => $product['name_product'],
            'price_product' => $product['price_product'],
            'code_product' => $product['code_product'],
            'image_product' => $product['image_product'],
            'number_product' => $product['number_product'],
            'qty' => $qty,
            'sub_total' => $product['price_product'] * $qty
        );
        update_info_cart();
        header("location:?mod=cart&act=show");
    } else {
        redirect("?mod=home&act=main&add_cart=false");
    }
}
