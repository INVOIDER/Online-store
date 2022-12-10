<?php
//Файл распределитель по функциям
session_start();
require "bd_connector.php";
require "products_controller.php";
if (isset($_GET['cart'])){
    switch ($_GET['cart']){
        case 'add':
            $id = isset($_GET['id'])? (int)$_GET['id'] : 0;
            $product = get_product($id);
            if (!$product) {
                echo json_encode(['code' => 'error', 'answer' => 'Error product']);
            } else {
                add_to_cart($product);
                echo json_encode(['code' => 'ok', 'answer' => 'Продукт успешно добавлен в корзину']);
            }
            break;
        case 'order':
            makeOrder();
            break;
        case 'delete':
            clearCart();
            break;
    }
}
