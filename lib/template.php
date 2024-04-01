<?php
function get_header()
{
    $path_header = "inc/header.php";
    if (file_exists($path_header)) {
        require $path_header;
    } else {
        echo "Không tồn tại file đường dẫn {$path_header}";
    }
}
function get_footer()
{
    $path_footer = "inc/footer.php";
    if (file_exists($path_footer)) {
        require $path_footer;
    } else {
        echo "Không tồn tại file đường dẫn {$path_footer}";
    }
}
function get_header_top()
{
    $path_footer = "inc/header_top.php";
    if (file_exists($path_footer)) {
        require $path_footer;
    } else {
        echo "Không tồn tại file đường dẫn {$path_footer}";
    }
}
function get_header_bottom()
{
    $path_footer = "inc/header_botton.php";
    if (file_exists($path_footer)) {
        require $path_footer;
    } else {
        echo "Không tồn tại file đường dẫn {$path_footer}";
    }
}
function get_banner()
{
    $path_footer = "inc/banner.php";
    if (file_exists($path_footer)) {
        require $path_footer;
    } else {
        echo "Không tồn tại file đường dẫn {$path_footer}";
    }
}
function get_slider()
{
    $path_footer = "inc/slider.php";
    if (file_exists($path_footer)) {
        require $path_footer;
    } else {
        echo "Không tồn tại file đường dẫn {$path_footer}";
    }
}
