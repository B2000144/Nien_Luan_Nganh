<?php
session_start();
unset($_SESSION['is_login']);
unset($_SESSION['user_login']);
header("location: ?act=login");
