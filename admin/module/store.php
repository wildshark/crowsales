<?php

class store{

    public static function add(){

        $sql="INSERT INTO `stores`(`store_name`, `store_address`,`mobile`) VALUES (?,?,?)";
    }

    public static  function update(){

        $sql="UPDATE `stores` SET `store_name` = ?, `store_address` = ?, `mobile` = ? WHERE `store_id` =?";

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