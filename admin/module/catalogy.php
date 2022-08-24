<?php

class catalogy{

    public static function add(){

        $sql ="INSERT INTO `catagory`(`catagory`) VALUES (?)";

    }

    public static function update(){

        $sql ="UPDATE `catagory` SET `catagory` =? WHERE `catagory_id` = ?";

    } 

    public static function change_status(){

        $sql ="UPDATE `catagory` SET `status` =? WHERE `catagory_id` =?";

    }

    public static function delete(){

        $sql = "UPDATE `catagory` SET `action` = '2' WHERE `catagory_id` =?";

    }
}

?>