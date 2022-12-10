<?php
//Файл с функциями работы с бд товаров и заказов
require "bd_connector.php";
function get_categories():array // получение списка категорий
{
    global $db;
    $result = mysqli_query($db,'SELECT * FROM categories');
    return mysqli_fetch_all($result,MYSQLI_ASSOC);
}
function get_category(int $catId):array // Получение нужной категории по id
{
    global $db;
    $result = mysqli_query($db,"SELECT * FROM `categories` WHERE category_id ='$catId' "); // запрос на выборку
    return mysqli_fetch_array($result, MYSQLI_ASSOC);
}
function get_products(int $catId):array
{
    global $db;
    $result = mysqli_query($db,"SELECT * FROM `product` WHERE category_id ='$catId' "); // запрос на выборку
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
function get_last_products():array //Функция вывода новых товаров
{
    global $db;
    $result = mysqli_query($db, "SELECT * FROM `product` ORDER BY `id` DESC LIMIT 5");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


function get_product(int $id): array //Получение товара по id
{
    global $db;
    $stmt = mysqli_query($db, "SELECT * FROM product WHERE id = '$id'");
    return mysqli_fetch_array($stmt,MYSQLI_ASSOC);
}

function add_to_cart($product): void //Функция добавления товара в корзину
{
    global $db;
    $productId = $product['id'];
    $userId = $_SESSION['id'];
    $result = mysqli_query($db,"SELECT `order_id` FROM `order` WHERE `id_product` ='$productId' AND `id_user`='$userId'");
    $myrow = $result->fetch_assoc();
    if (!empty($myrow['order_id']))
    {

        mysqli_query($db,"UPDATE `order` SET amount = amount +1 WHERE `id_product`='$productId'");
    }else
    {
        mysqli_query($db,"INSERT INTO `order`(`id_product`, `id_user`) VALUES ('$productId',' $userId')");
    }
}

function makeOrder():void //Функция заказа
{
    global $db;
    $orders = getOrderTable();
    foreach ($orders as $order)
    {
        $order_product_id = $order['id_product'];
        $order_amount = $order['amount'];
        mysqli_query($db,"UPDATE `product` SET amount = amount - '$order_amount' WHERE id ='$order_product_id'");
    }
    clearCart();
}

function clearCart():void //Функция очистки корзины
{
    global $db;
    $user_id = $_SESSION['id'];
    mysqli_query($db,"DELETE FROM `order` WHERE id_user = '$user_id'");

}
//debug func
function getOrderTable():array //Функция получения таблицы заказов пользователя
{
    global $db;
    $id_user = $_SESSION['id'];
    $result2 = mysqli_query($db,"SELECT * FROM `order` WHERE id_user = '$id_user'");
    return mysqli_fetch_all($result2, MYSQLI_ASSOC);
}

function get_cart():array
{
    global $db;
    $user_id = $_SESSION['id'];
    $result2 = mysqli_query($db,"SELECT * FROM mybase.product INNER JOIN mybase.order ON product.id = order.id_product WHERE order.id_user = '$user_id'");
    return mysqli_fetch_all($result2, MYSQLI_ASSOC);

}