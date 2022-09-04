<?php

class brand{

    public static function add($conn,$request){

        $sql ="INSERT INTO `brand`(`brand`) VALUES (?)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute($request);
    }

    public static function update($conn,$request){

        $sql = "UPDATE `brand` SET `brand` = ?, `status` =? WHERE `brand_id` =?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute($request);
    }

    public static function delete($conn,$request){

        $sql ="UPDATE `brand` SET `status` = 'Delete' WHERE `brand_id` =:id";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([':id'=>$request]);
    }

    public static function fetch($conn){

        $sql ="SELECT * FROM `brand` WHERE `status`<>'Delete' LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function view($conn,$request){

        $sql ="SELECT * FROM `brand` WHERE `brand_id`=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id'=>$request]);
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }
}

?>