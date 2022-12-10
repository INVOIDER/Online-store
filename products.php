<?php
error_reporting(-1);
session_start();
require_once 'bd_connector.php';
require_once 'products_controller.php';
?>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <title>Guitar Hero</title>
</head>
<body>
<?php
require 'header.php';
$catId = 1;
if(isset($_GET['cat_id']))
{
$catId = $_GET['cat_id'];
}
$products = get_products($catId);
$category = get_category($catId);
?>
<div class="wrapper mt-5 mb-10">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><?= $category['category_name']?></h1>
            </div>
            <div class="product-cards mb-5">
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="product-card">
                            <div class="card-thumb">
                                <a href="product.php?id=<?= $product['id'] ?>"><img src="assets/guitars/<?= $product['image'] ?>" alt="<?= $product['name'] ?>"></a>
                            </div>
                            <div class="card-caption">
                                <div class="card-title">
                                    <a href="product.php?id=<?= $product['id'] ?>"><?= $product['name'] ?></a>
                                </div>
                                <?php if ($product['amount'] > 0): ?>
                                <div class="item-status"><i class="fas fa-check text-success"></i> В наличии</div>
                                <div class="card-price text-center">
                                    <?= $product['price'] ?> р.
                                </div>
                                <button href="?cart=add&id=<?= $product['id'] ?>" class="btn btn-info btn-block addToCart" data-id="<?= $product['id'] ?>">
                                    <i class="fas fa-cart-arrow-down"></i> Купить
                                </button>
                                <?php endif;?>
                                <?php if ($product['amount'] == 0): ?>
                                    <div class="item-status"><i class="fa-solid fa-xmark"></i> Нет в наличии</div>
                                    <div class="card-price text-center">
                                        <?= $product['price'] ?> р.
                                    </div>
                                <?php endif;?>
                            </div>
                        </div><!-- /product-card -->
                    <?php endforeach; ?>
                <?php endif; ?>

            </div><!-- /product-cards -->

        </div><!-- /row -->
    </div><!-- /container -->
    <?php
    include_once "footer.php";
    ?>
</div><!-- /wrapper -->



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="ajax_controller.js"></script>
</body>
</html>
