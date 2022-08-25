<?php

class store{

    public static function add($conn,$request){

        $sql="INSERT INTO `stores`(`store_name`, `store_address`, `mobile`, `email`) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute($request);
    }

    public static  function update($conn,$request){

        $sql="UPDATE `stores` SET `store_name` = ?, `store_address` = ?, `mobile` = ?, `email` = ?, `status` =? WHERE `store_id` =?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute($request);
    }

    public static function fetch($conn){

        $sql ="SELECT stores.* FROM stores WHERE stores.`status` <> 'Delete' ORDER BY stores.store_id DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function view($conn,$request){
        $sql ="SELECT * FROM `stores` WHERE `store_id`=:id LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
        $stmt->execute([":id"=>$request]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function delete($conn,$request){

        $sql="UPDATE `stores` SET `status` = 'Delete' WHERE `store_id` =:id";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([":id"=>$request]);
    }

    public static function add_user_access(){

        $sql="INSERT INTO `user_store_access`(`store_id`, `user_id`) VALUES (?,?)";
    }

    public static function user_access($conn,$id){

        $sql ="SELECT user_store_access.* FROM user_store_access WHERE user_store_access.user_id = :id AND user_store_access.states LIKE '%Enable%' ORDER BY user_store_access.link_id DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute([":id"=>$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function change_status(){

        $sql ="UPDATE `stores` SET `status` =? WHERE `store_id` =?";

    }
}
?>