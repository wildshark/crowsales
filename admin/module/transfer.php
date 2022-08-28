<?php

class transfer{

    public static function get_store($conn,$request){

        $sql ="SELECT * FROM `stores` WHERE `store_id`=:id LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
        $stmt->execute([":id"=>$request]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function add($conn,$request){

        $sql ="INSERT INTO `stock_transfer`(`issus_date`, `from_store_id`, `to_store_id`, `from_store_name`, `to_store_name`) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute($request);
    }

    public static function add_issus_out($conn,$request){

        $sql="INSERT INTO `transaction`(`invoice_id`, `store_id`, `user_id`, `product_id`, `tran_type_id`, `tran_date`, `price`, `issuse_out`) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute($request);
    }

    public static function add_issus_in($conn,$request){

        $sql="INSERT INTO `transaction`(`invoice_id`, `store_id`, `user_id`, `product_id`, `tran_type_id`, `tran_date`, `price`, `issuse_in`) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute($request);
    }

    public static function delete($conn,$request){

        $sql="DELETE FROM `stock_transfer` WHERE `issus_id` =:id";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([":id"=>$request]);
    }
}

?>