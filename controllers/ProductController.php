<?php


namespace app\controllers;

use app\models\Product;

class ProductController extends MainController
{

    public function actionIndex() {
        $model = Product::getALl();
        echo $this->render('catalog', ['model' => $model]);
    }
    public function actionSingle() {
        $id = $_GET['id'];
        $model = Product::getById($id);
        echo $this->render('product_single', ['model' => $model]);
    }

}