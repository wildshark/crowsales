<?php

class brand{

    public static function add(){

        $sql ="INSERT INTO `band`(`band`, `image`) VALUES (?, ?)";
    }

    public static function update(){

        $sql = "UPDATE `band` SET `band` =?, `image` =? WHERE `brand_id` =?";

    }

    public static function delete(){

        $sql ="UPDATE `band` SET `status` = 'Delete' WHERE `brand_id` =?";
    }
}

?>