<?php

class brand{

    public static function add($conn,$request){

        $sql ="INSERT INTO `band`(`band`, `image`) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute();
    }

    public static function update(){

        $sql = "UPDATE `band` SET `band` =?, `image` =? WHERE `brand_id` =?";

    }

    public static function delete(){

        $sql ="UPDATE `band` SET `status` = 'Delete' WHERE `brand_id` =?";
    }

    public static function fetch($conn){

        $sql ="SELECT * FROM `brand` LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}

?>