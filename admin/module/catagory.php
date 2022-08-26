<?php

class catagory{

    public static function add($conn,$request){

        $sql ="INSERT INTO `catagory`(`catagory`) VALUES (?)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute($request);
    }

    public static function fetch($conn){

        $sql ="SELECT * FROM `catagory` WHERE `status`<>'Delete' LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function view($conn,$request){

        $sql ="SELECT * FROM `catagory` WHERE `catagory_id`=:id LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id'=>$request]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function total_product($conn,$id){
        $sql="SELECT COUNT(product_id) AS total FROM products WHERE products.`status` <> 'Delete' AND products.catagory_id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([":id"=>$id]);
        $product = $sql->fetch();
        if($product == false){
            $total = 0;
        }else{
            $total = $product['total']; 
        }
        return $total;
    }

    public static function count_product_group($conn,$id){

        $sql="SELECT
        count(products.product_id) AS total
    FROM
        products
    WHERE
        products.`status` LIKE '%Enable%' AND
        products.catalogy_id = :id
    GROUP BY
        products.catalogy_id";
          $stmt = $conn->prepare($sql);
          $stmt->execute([":id"=>$id]);
          while ($row = $sql->fetchAll(PDO::FETCH_ASSOC))  {
            $id = $row['id'];
            $content = $row['content'];
        }
          if($output == false){
            return 0;
          }else{
            return $output['total'];
          }

    }

    public static function update($conn,$request){

        $sql ="UPDATE `catagory` SET `catagory` =?, `status` =? WHERE `catagory_id` =?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute($request);
    } 

    public static function change_status(){

        $sql ="UPDATE `catagory` SET `status` =? WHERE `catagory_id` =?";

    }

    public static function delete($conn,$request){

        $sql = "UPDATE `catagory` SET `status` = 'Delete' WHERE `catagory_id` =:id";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([':id'=>$request]);
    }
}

?>