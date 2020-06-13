<?php

// * 1. Создать структуру классов ведения товарной номенклатуры.
//а) Есть абстрактный товар.
//б) Есть цифровой товар, штучный физический товар и товар на вес.
//в) У каждого есть метод подсчета финальной стоимости.
//г) У цифрового товара стоимость постоянная – дешевле штучного товара в два раза. У штучного товара обычная стоимость, у весового – в зависимости от продаваемого количества в килограммах. У всех формируется в конечном итоге доход с продаж.
//д) Что можно вынести в абстрактный класс, наследование?
// */
interface ModelInterface
{
    public function setType($inputType): string;
    public function setWight($inputWight) :int;

}

abstract class ModelProduct implements ModelInterface
{
    protected $type;
    protected $wight;

    public function __construct(string $inputType, int $inputWight = 0)
    {
        $this->type = $this->setType($inputType);
        $this->wight = $inputWight;
    }

}


class Product extends ModelProduct {

    protected $price = 100; //задавать так цену странно, но иначе не имеет смысла условие о расчете стоимости.
    protected $correctPrice;

        public function setType($inputType): string
    {
        return $this->type = $inputType;
    }

    public function setWight($inputWight): int
    {
        return $this->wight = $inputWight;
    }


    public function calcPrice(): int
    {
        switch ($this->type) {
            case 'digital':
                return $this->correctPrice = $this->price / 2;
                break;
            case
            'original':
                return $this->correctPrice = $this->price;
                break;
            case 'bulk':
                return $this->correctPrice = $this->price * $this->wight;
                break;
        }
        return $this->correctPrice;
    }

    public function sayPrice() {
        echo "цена  {$this->calcPrice()} <br>";
    }

}

$digital = new Product('digital');

$digital->sayPrice();



$original = new Product( 'original');

$original->sayPrice();


$bulk = new Product( 'bulk', 12);
$bulk->sayPrice();

