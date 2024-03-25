<?php
if (isset($_POST['btn_update'])) {
    $qty = $_POST['qty'];
    foreach ($qty as $id => $new_qty) {
        $_SESSION['cart']['buy'][$id]['qty'] = $new_qty;
        $_SESSION['cart']['buy'][$id]['sub_total'] = $new_qty * $_SESSION['cart']['buy'][$id]['price_product'];
    }
    update_info_cart();
    redirect("?mod=cart&act=show");
}
