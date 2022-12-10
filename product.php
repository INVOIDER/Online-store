<?php
session_start();
include "products_controller.php";
include "bd_connector.php";
?>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <link rel="stylesheet" href="style.css">

    <title>Продукт</title>
</head>
<body>

<?php
include "header.php";
$product_id = $_GET['id'];
$product = get_product($product_id);
?>

<div class="wrapper mt-5 product-item mb-5">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <h1><?= $product['name']?></h1>
            </div>

            <div class="col-sm-4">
                <div class="product-item-thumb d-flex justify-content-center">
                    <img src="assets/guitars/<?= $product['image'] ?>" alt="<?= $product['name']?>">
                </div>

            </div>

            <div class="col-sm-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-price">
                            <?= $product['price']?> p.

                            <?php if ($product['amount'] > 0): ?>
                            <span class="item-status">
                                    <i class="fas fa-check text-success"></i> В наличии
                                </span>
                            <?php endif;?>
                            <?php if ($product['amount'] == 0): ?>
                            <span class="item-status">
                                    <i class="fa-solid fa-xmark"></i> Нет в наличии
                                </span>
                            <?php endif;?>
                    </div>
                    </div>
                    <?php if ($product['amount'] > 0): ?>
                    <div class="col-md-6">
                        <a href="?cart=add&id=<?= $product['id'] ?>" class="btn btn-info btn-block addToCart" data-id="<?= $product['id'] ?>">
                            <i class="fas fa-cart-arrow-down"> Добавить в корзину</i>
                        </a>
                    </div>
                    <?php endif;?>
                </div>

                <hr>
                <div class="card-desc">
                    <?= $product['description']?>
                </div>

            </div>


        </div><!-- /row -->
    </div><!-- /container -->
</div><!-- /wrapper -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="ajax_controller.js"></script>
</body>
</html>