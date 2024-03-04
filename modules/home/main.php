<?php
$sql = "SELECT * FROM `tbl_product`";

$rows = mysqli_query($conn, $sql);
$product = mysqli_fetch_all($rows, MYSQLI_ASSOC);

echo "<pre>";
print_r($product);
echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm bg-light">

            <div class="container-fluid">
                <!-- Links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping "></i></a>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <?php foreach ($product as $products) : ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card">
                            <img src="<?php echo "../../admin/" . $products['image_product'] ?>" alt="" class="imgcrop">
                            <div class="card-body">
                                <p><?= $products['name_product'] ?></p>
                                <p><?= number_format($products['price_product']) . " đ"  ?></p>
                                <a href="?mod=cart&act=add&id=<?= $products['product_id'] ?>"><input type="submit" value="Thêm vào giỏ hàng" class="btn btn-primary"></a>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
    <footer>

    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>