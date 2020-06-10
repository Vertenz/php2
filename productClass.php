<?php
    class Product {
      protected $id;
      public $name;
      public $price;
      public $type;
      public $description;

      public function __construct(int $id ,string $name, int $price, string $type, string $description) {
          $this->id = (int) $id;
          $this->name = (string) $name;
          $this->price = (int) $price;
          $this->type = (string) $type;
          $this->description = (string) $description;
      }

      protected function calcSale( int $sale) {
          return $salePrice = (int) $this->price - ($this->price * ($sale / 100));
      }
    };

    class Laptop extends Product {
        public function printProductSale(int $sale) {
            $price = (int) $this->calcSale($sale);
            echo "
                <h1>$this->name</h1>
                <h3>$price</h3>
                ";
        }
    }

$productAcer = new Laptop(1, 'Acer Aspire', 800, 'laptop', 'new laptop');

$productAcer->printProductSale(25);