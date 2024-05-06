<?php get_header();
get_header_top();
get_header_bottom();
if (isset($_POST['btn_login'])) {
    $error = array();
    if (empty($_POST['username'])) {
        $error['username'] = "tên đăng nhập không được để trống";
    } else {
        $username = $_POST['username'];
    }
    if (empty($_POST['password'])) {
        $error['password'] = "Mật khẩu không được để trống";
    } else {
        $password = $_POST['password'];
    }
    if (empty($error)) {
        $sql = "SELECT * FROM `tbl_user` WHERE user_name = '$username'AND password = '$password'";
        $row = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($row);
        $count = mysqli_num_rows($row);
        if ($count == 1) {
            $_SESSION['is_login_user'] = true;
            $_SESSION['username'] = $user['name'];
            $_SESSION['email'] = $user['user_name'];
            redirect("?mod=home&act=main");
        } else {
            $error['request'] = "Bạn nhập sai tk hoặc mk";
        }
    }
}
?>
<style>
    .main-login {
        background-color: #F6EEE1;
        height: 770px;
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
                <form method="POST" id="Validation_Login" autocomplete="off">
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
                            <input class="form-input  m-0" type="password" name="password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 w-100"><button type="submit" name="btn_login" class="btn btn-dark btn-block mb-4">Đăng nhập</button></div>
                        <div class="col-md-5 w-100"><?php echo "<p class = 'error'>{$error['request']}</p>" ?></div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
<?php get_footer() ?>