<?php
//$_SESSION['cart'][$productId]

namespace app\controllers;


use app\services\Session;

class CartController extends MainController {

    //временно для проверки метода
   public function post($name) {
        return $_POST["$name"];
    }


    public function actionAdd() {
            $productId = (int) $this->post('product_id');
            $productQty = (int)$this->post('qty');
            $arr = Session::get('cart', $productId);
            Session::push($arr, $productId, $productQty);
        echo json_encode(['success' => 'ok', 'message' => 'Товар добавлен!']);
    }

}