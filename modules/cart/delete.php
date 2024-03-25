<?php
$id = (int)$_GET['id'];
if (isset($_SESSION['cart'])) {
    if (!empty($id)) {
        unset($_SESSION['cart']['buy'][$id]);
        update_info_cart();
    } else {
        unset($_SESSION['cart']);
    }
}

redirect("?mod=cart&act=show");
