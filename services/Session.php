<?php


namespace app\services;


class Session
{
   public function session() {
        return session_start();
    }

   public function session_set($key, $value) {
        $_SESSION[$key] = $value;
    }

   public function end_session() {
        session_unset();
    }

    public static function get($key, $value = null) {
       if (!$value) {
           return $_SESSION["$key"];
       }else {
           return $_SESSION["$key"]["$value"];
       }
    }

    public static function push($arr, $productId, $productQty) {
        if (isset($arr)) {
           return $_SESSION['cart'][$productId] += $productQty;
        } else {
           return $_SESSION['cart'][$productId] = $productQty;
        }
    }

}