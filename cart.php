<?php
//Корзина
session_start();
include "bd_connector.php";
include "products_controller.php";
global $db;
$result = mysqli_query($db,"SELECT * FROM `order`");
$myrow = $result->fetch_assoc();
$products = get_cart();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <title>Моя корзина</title>
</head>
<body>
<?php include "header.php";?>
        <div class="wrapper mt-5">
            <div class = "container justify-content-center">
                <?php if(empty($products)):?>
                    <h1 style="text-align: center">Ваша корзина пуста</h1>
                <?php endif ?>
                <?php if(!empty($products)):?>
                <div class="col-12">
                    <h1>Ваша корзина:</h1>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $product):?>
                    <tr>
                        <td><div class="card-thumb"><a href="product.php?id=<?= $product['id'] ?>"><img src="assets/guitars/<?= $product['image'] ?>" alt="<?= $product['name'] ?>"></a></div></td>
                        <td><a href="product.php?id=<?= $product['id'] ?>"><?= $product['name'] ?></a></td>
                        <td><?= $product['price']?></td>
                        <td><?= $product['amount']?></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
                </table>
                <div class="changeOrder">
                    <button class="changeBtn btn btn-info" id = "orderBtn">Оплатить</button>
                    <button class="changeBtn btn btn-info" id = "deleteBtn">Очистить корзину</button>
                </div>
            </div>
            <?php endif; ?>
        </div>


<?php
include_once "footer.php";
?>
    <!-- Подключаем скрипты -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src ="ajax_controller.js"></script>
    <!-- ------------------ -->
</body>
</html>