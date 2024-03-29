<?php get_header();
get_header_top();
get_header_bottom();
if (isset($_POST['btn_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `tbl_user` WHERE user_name = '$username'AND password = '$password'";
    $row = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($row);
    if ($count == 1) {
        $_SESSION['is_login_user'] = true;
        $_SESSION['username'] = $username;
        redirect("?mod=home&act=main");
    }
}
?>
<style>
    .main-login {
        background-color: #F6EEE1;
        height: 700px;
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
</style>
<div class="main-login position-relative">
    <img class="img-login position-absolute " src="https://js0fpsb45jobj.vcdn.cloud/storage/upload/media/login/image83-standard-scale-2-00x-gigapixel.png" alt="">
    <div class="container ">
        <div class="row">
            <div class="col-md-4  bg-white mt-5 rounded p-4">
                <p class="text-start title_login pt-2">Đăng nhập</p>
                <p class="text-start pb-3">Trở thành thành viên <a href="?mod=user&act=Register">Đăng kí ngay</a></p>
                <form method="POST">
                    <div class="row">
                        <div class="col-md-12 ">
                            <p class="text-start m-0">Tài khoản</p>
                        </div>
                        <div class="col-md-12 pb-5">
                            <input class="form-input m-0" type="text" name="username">
                        </div>
                        <div class="col-md-12">
                            <p class="text-start m-0">Mật khẩu</p>
                        </div>
                        <div class="col-md-12 pb-5">
                            <input class="form-input  m-0" type="text" name="password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5"><button type="submit" name="btn_login" class="btn btn-dark btn-block mb-4">Đăng nhập</button></div>
                        <div class="col-md-7"><button type="submit" name="btn_login" class="btn btn-block mb-4">Quên mật khẩu</button></div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>