<?php
    class User {
        public $name;
        public $type;
        public function __construct(string $name, string $type) {
            $this->name = (string) $name;
            $this->type = (string) $type;
        }
        public function seyHi () {
            echo "Hi $this->name <br>";
            if ($this->type == (string) admin) {
                echo "Ur admin<br><hr>";
            }
        }
    };

    $userAdmin = new User('Admin', 'admin');
    $userUsual = new User('Usual', 'user');

    $userAdmin->seyHi();
    $userUsual->seyHi();


