<?php get_header();
get_header_top();
get_header_bottom();
$date = date("Y-m-d H:i:s");


if (isset($_POST['btn_register'])) {
    $error = array();
    if (empty($_POST['surname'])) {
        $error['surname'] = "Không được để trống Họ";
    } else {
        $surname = $_POST['surname'];
    }
    if (empty($_POST['name'])) {
        $error['name'] = "Không được để trống Tên";
    } else {
        $name = $_POST['name'];
    }
    if (empty($_POST['user_name'])) {
        $error['user_name'] = "Không được để trống Email";
    } else {
        $username = $_POST['user_name'];
    }
    if (empty($_POST['number_phone'])) {
        $error['number_phone'] = "Không được để trống Số điện thoại";
    } else {
        $phone_number = $_POST['number_phone'];
    }
    if ($_POST['password'] == $_POST['re_password']) {
        $password = $_POST['password'];
    } else {
        $error['password'] = "Mật khẩu không khớp";
    }
    if (empty($error)) {
        $sql = "INSERT INTO `tbl_user`(`password`, `user_name`, `created_date`, `phone_number`, `surname`, `name`) VALUES ('$password','$username','$date','$phone_number','$surname','$name')";
        mysqli_query($conn, $sql);
        redirect("?mod=user&act=login");
    }
}
?>
<style>
    .main-register {
        background-color: #F6EEE1;
        height: 1000px;
    }

    .img-login {
        height: 665px;

    }

    .form-input {
        width: 100%;
        appearance: none;
        height: 50px;
        border: 1px solid hsla(0, 0%, 44%, .25);
        border-radius: 20px;
        transition: all .25s linear;
        margin: 20px 0;
    }

    .title_login {
        font-size: 36px;
        font-weight: 800;
    }

    .error {
        color: red;
        text-align: start;
    }
</style>
<div class="main-register position-relative">
    <img class="img-login position-absolute " src="https://js0fpsb45jobj.vcdn.cloud/storage/upload/media/login/image83-standard-scale-2-00x-gigapixel.png" alt="">
    <div class="container pb-5">
        <div class="row">
            <div class="col-md-4  bg-white mt-5 rounded p-4">
                <p class="text-start title_login pt-2">Đăng ký</p>
                <form method="POST" id="Validation_Register">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="text-start m-0">Họ</p>
                            <input class="form-input m-0" type="text" name="surname">
                        </div>
                        <div class="col-md-6 pb-5">
                            <p class="text-start m-0">Tên</p>
                            <input class="form-input m-0" type="text" name="name">
                        </div>
                        <div class="col-md-12  pb-5">
                            <p class="text-start m-0">Email/tên đăng nhập</p>
                            <input class="form-input m-0" type="email" name="user_name">
                        </div>
                        <div class="col-md-12  pb-5">
                            <p class="text-start m-0">Số điện thoại</p>
                            <input class="form-input m-0" type="text" name="number_phone">
                        </div>
                        <div class="col-md-12  pb-5">
                            <p class="text-start m-0">Mật khẩu</p>
                            <input class="form-input m-0" type="password" name="password">
                        </div>
                        <div class="col-md-12  pb-5">
                            <p class="text-start m-0">Nhập lại mật khẩu</p>
                            <input class="form-input m-0" type="password" name="re_password">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" name="btn_register" class="btn btn-dark btn-block mb-4 w-100">Đăng ký</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php get_footer(); ?>