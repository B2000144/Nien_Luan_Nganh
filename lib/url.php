<?php
function redirect($url)
{
    if (!empty($url)) {
        header("location: {$url}");
    }
}
