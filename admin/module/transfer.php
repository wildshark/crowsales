<?php

class transfer{

    public static function add($conn,$request){

        $sql ="INSERT INTO `stock_transfer`(`issus_date`, `from_store_id`, `to_store_id`, `from_store_name`, `to_store_name`) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute($request);
    }

    public static function fetch($conn){

        $sql ="";
    }
}

?>