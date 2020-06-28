<?php
namespace app\models;


class cart
{
    protected $id;
    protected $customer;
    protected $cost;
    protected $status;

    public function getTableName(): string
    {
        return "cart";
    }

    /**
     * @return int
     */
    public function getId() :int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getCustomer() :string
    {
        return $this->customer;
    }

    /**
     * @param mixed $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return int
     */
    public function getCost() :int
    {
        return $this->cost;
    }

    /**
     *@@mixed cost
     */
    public function setCost($cost) :int
    {
        $this->cost = $cost;
    }

    /**
     * @return string
     */
    public function getStatus() :string
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setPrice($status)
    {
        $this->status = $status;
    }


}