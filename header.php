<?php
include_once 'products_controller.php';
$ctgs= get_categories();
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>-->
<script src="https://kit.fontawesome.com/1e3e06c842.js" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <a class="navbar-brand" href="index.php"><img src="assets/logo.png" alt="лого" width="70" height="20"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="products.php"><i class="fa fa-bars"></i> Категории</i></i></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <?php foreach ($ctgs as $category):?>
                    <a class="dropdown-item" href="products.php?cat_id=<?= $category['category_id']?>"><?= $category['category_name']?></a>
                    <?php endforeach;?>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">

            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><i class="far fa-user"></i></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <?php if (!isset($_SESSION['id'])): ?>
                    <a class="dropdown-item" href="login.php">Логин</a>
                    <a class="dropdown-item" href="reg.php">Регистрация</a>
                    <?php endif;?>
                    <?php if (isset($_SESSION['id'])): ?>
                        <form action="login_controller.php" method="post">
                            <input type="submit" name="outer" class="dropdown-item" value="Выйти">
                        </form>
                </div>
            </li>
            <li class="nav-item"><a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> Корзина</a></li>
                    <?php endif;?>
        </ul>
    </div>
</nav>