<?php
$id = $_GET['id'];
$sql = "SELECT * FROM `tbl_product` WHERE product_id = $id";
$row =  mysqli_query($conn, $sql);
if ($row && mysqli_num_rows($row) > 0) {
    $product = mysqli_fetch_assoc($row);
    show_array($product);

    $qty = 1;
    if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
        $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
    }
    $_SESSION['cart']['buy'][$id] = array(
        'id' => $product['product_id'],
        'name_product' => $product['name_product'],
        'price_product' => $product['price_product'],
        'code_product' => $product['code_product'],
        'image_product' => $product['image_product'],
        'qty' => $qty,
        'sub_total' => $product['price_product'] * $qty
    );
    $num_order = 0;
    $total = 0;
    foreach ($_SESSION['cart']['buy'] as $item) {
        $num_order += $item['qty'];
        $total += $item['sub_total'];
    }

    $_SESSION['cart']['info'] = array(
        'num_order' => $num_order,
        'total_order' => $total
    );
    show_array($_SESSION['cart']);
}
