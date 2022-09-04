<?php

class product{

    public static function add($conn,$request){

        $sql ="INSERT INTO `products`(`catagory_id`, `brand_id`, `product_name`, `product_sku`, `description`, `discount`, `price`, `tax`,`purchase_price`) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute($request);
    }

    public static function update($conn,$request){

        $sql ="UPDATE `products` SET `catagory_id` = ?, `brand_id` = ?, `product_name` = ?, `product_sku` = ?, `description` = ?, `discount` = ?, `price` = ?, `tax` = ?, `status` = ?,`purchase_price`=? WHERE `product_id` =?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute($request);
    }

    public static function fetch($conn){

        $sql ="SELECT
        products.*, 
        brand.brand, 
        catagory.catagory
    FROM
        products
        INNER JOIN
        brand
        ON 
            products.brand_id = brand.brand_id
        INNER JOIN
        catagory
        ON 
            products.catagory_id = catagory.catagory_id
    WHERE
        products.`status` <> 'Delete'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function available($conn){

        $sql ="SELECT
        products.*, 
        brand.brand, 
        catagory.catagory
    FROM
        products
        INNER JOIN
        brand
        ON 
            products.brand_id = brand.brand_id
        INNER JOIN
        catagory
        ON 
            products.catagory_id = catagory.catagory_id
    WHERE
        products.`status` = 'Enable'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function view($conn,$id){

        $sql="SELECT
        products.*, 
        brand.brand, 
        catagory.catagory
    FROM
        products
        INNER JOIN
        brand
        ON 
            products.brand_id = brand.brand_id
        INNER JOIN
        catagory
        ON 
            products.catagory_id = catagory.catagory_id
    WHERE
        products.product_id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    public static function delete($conn,$id){
        
        $sql ="UPDATE `products` SET `status` = 'Delete' WHERE `product_id` =:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
    }


}

?>