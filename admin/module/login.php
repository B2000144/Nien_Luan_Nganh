<?php
require "../data/connect.php";

if (isset($_POST['btn_login'])) {
    $error = array();
    #kiểm tra username
    if (empty($_POST['username'])) {
        $error['username'] = "bạn cần nhập username";
    } else {
        $pattern = '/^[A-Za-z0-9_\.]{6,32}$/';
        $subject = $_POST['username'];
        if (!preg_match($pattern, $subject)) {
            $error['username'] = "tên đăng nhập không đúng định dạng";
        } else {
            $username = $_POST['username'];
        }
    }
    #kiểm tra password
    if (empty($_POST['password'])) {
        $error['password'] = "bạn cần nhập password";
    } else {
        $pattern = '/^[A-Za-z0-9_\.!@#$%^&()]{6,32}$/';
        $subject = $_POST['password'];
        if (!preg_match($pattern, $subject)) {
            $error['password'] = "mật khẩu không đúng định dạng";
        } else {
            $password = $_POST['password'];
        }
    }
    #kết luận
    if (empty($error)) {
        //xử lí login
        $rows = mysqli_query($conn, "SELECT * FROM tbl_admin where username='$username' and password='$password'");
        $count = mysqli_num_rows($rows);
        if ($count == 1) {
            $_SESSION['is_login'] = true;
            $_SESSION['user_login'] = $username;
            header("location:?act=main");
        } else {
            $error['account'] = "Tên đăng nhập hoặc mật khẩu không chính xác";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../public/css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="main_login_admin">
        <div class="container d-flex justify-content-center lign-items-center mt-5 pt-5 ">
            <form action="" method="POST">
                <h1>Đăng nhập trang quản trị</h1>
                <div class="mb-3">
                    <?php
                    if (!empty($error['username'])) {
                    ?>
                        <p class="error">
                            <?php echo $error['username']; ?>
                        </p>
                    <?php
                    }
                    ?>
                    <input type="text" name="username" class="w-100" placeholder="Tài khoản">
                </div>
                <div class="mb-3">
                    <?php
                    if (!empty($error['password'])) {
                    ?>
                        <p class="error">
                            <?php echo $error['password']; ?>
                        </p>
                    <?php
                    }
                    ?>
                    <input type="password" name="password" class="w-100" placeholder="Mật khẩu">
                </div>
                <div class="mb-3">
                    <input type="submit" name="btn_login" class="btn btn-primary w-100" value="Đăng nhập">
                </div>
                <?php
                if (!empty($error['account'])) {
                ?>
                    <p class="error">
                        <?php echo $error['account']; ?>
                    </p>
                <?php
                }
                ?>

            </form>
        </div>

    </div>
</body>
<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</html>