<?php

namespace app\models;


class Product extends Record {
    public $id;
    public $name;
    public $price;
    public $descriptions;
    public $type;
    public $view;
    public $hrefPreview;
    public $hrefFull;
    public $quantity;




    public function __construct($id = null, $name = null, $price = null, $descriptions = null, $type = null, $view = 0,$hrefPreview = null, $hrefFull = null, $quantity = null)
    {
        parent::__construct();
        $this->id = (int) $id;
        $this->name = (string) $name;
        $this->price = (int) $price;
        $this->descriptions = (string) $descriptions;
        $this->type = (string) $type;
        $this->view = (int) $view;
        $this->hrefPreview = (string) $hrefPreview;
        $this->hrefFull = (string) $hrefFull;
        $this->quantity = (int) $quantity;

    }

    public static function getTableName(): string
    {
        return "product";
    }

}