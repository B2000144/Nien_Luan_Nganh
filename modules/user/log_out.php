<?php
if (isset($_SESSION['is_login_user'])) {
    unset($_SESSION['is_login_user']);
    unset($_SESSION['username']);
    redirect("?mod=home&act=main");
}
