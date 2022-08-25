<?php

class catagory{

    public static function add(){

        $sql ="INSERT INTO `catagory`(`catagory`) VALUES (?)";

    }

    public static function fetch($conn){

        $sql ="SELECT * FROM `catagory` LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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