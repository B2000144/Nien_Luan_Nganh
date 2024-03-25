<?php
function get_num_order()
{
    return ($_SESSION['cart']['info']['num_order']);
}
function get_total_order()
{
    return ($_SESSION['cart']['info']['total_order']);
}
function update_info_cart()
{
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
}
