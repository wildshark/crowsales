<?php

class product{

    public static function add(){

        $sql ="INSERT INTO `products`(`catalogy_id`, `brand_id`, `product_name`, `product_sku`, `description`, `discount`, `price`) VALUES (?,?,?,?,?,?,?)";
    }

    public static function update(){

        $sql  ="UPDATE `products` SET `catalogy_id` = 11, `brand_id` = 11, `product_name` = ?, `product_sku` = ?, `description` = ?, `discount` = ?, `price` = 11 WHERE `product_id` = ?";
    }

    public static function fetch($conn){

        $sql ="SELECT
	products.*, 
	catagory.catagory, 
	band.band, 
	band.image
FROM
	products
	INNER JOIN
	catagory
	ON 
		products.catalogy_id = catagory.catagory_id
	INNER JOIN
	band
	ON 
		products.brand_id = band.brand_id ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function view(){

    }

    public static function delete(){
        
        $sql ="UPDATE `products` SET `status` = 'Delete' WHERE `product_id` =?";
    }


}

?>