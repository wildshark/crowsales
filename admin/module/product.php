<?php

class product{

    public static function add(){

        $sql ="INSERT INTO `products`(`catalogy_id`, `brand_id`, `product_name`, `product_sku`, `description`, `discount`, `price`) VALUES (?,?,?,?,?,?,?)";
    }

    public static function update(){

        $sql  ="UPDATE `products` SET `catalogy_id` = 11, `brand_id` = 11, `product_name` = ?, `product_sku` = ?, `description` = ?, `discount` = ?, `price` = 11 WHERE `product_id` = ?";
    }

    public static function fetch(){

    }

    public static function view(){

    }

    public static function delete(){
        
        $sql ="UPDATE `products` SET `status` = 'Delete' WHERE `product_id` =?";
    }


}

?>