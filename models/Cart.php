<?php
namespace app\models;


class cart extends Record
{
    public $id;
    public $id_product;
    public $quantity;
    public $customer;
    public $cost;

    public function __construct($id = null, $id_product = null, $quantity = null, $customer = null, $cost = null)
    {
        parent::__construct();
        $this->id = (int) $id;
        $this->id_product = $id_product;
        $this->quantity = $quantity;
        $this->customer = $customer;
        $this->cost = $cost;

    }

    public static function getTableName(): string
    {
        return "cart";
    }


}