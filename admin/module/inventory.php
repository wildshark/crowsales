<?php

class inventory{

    public static function stock($conn){

        $sql="SELECT
        `transaction`.product_id, 
        sum(((`transaction`.purchase + `transaction`.issuse_in)- `transaction`.issuse_out)) AS purchase, 
        sum(`transaction`.sold) AS sales, 
        sum(`transaction`.`return`) AS sales_return, 
        sum(`transaction`.reject) AS purchase_reject, 
        products.product_name, 
        products.product_sku
    FROM
        `transaction`
        INNER JOIN
        products
        ON 
            `transaction`.product_id = products.product_id
    GROUP BY
        `transaction`.product_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function store_stock($conn,$id){

        $sql ="SELECT `transaction`.store_id, `transaction`.product_id, sum(purchase) AS purchase, sum(issuse_in) AS issuse_in, sum(issuse_out) AS issuse_out, sum(sold) AS sold, sum(`return`) AS sales_reject, sum(reject) AS purchase_reject, stores.store_name, products.product_name, products.product_sku, catagory.catagory FROM `transaction` INNER JOIN stores ON `transaction`.store_id = stores.store_id INNER JOIN products ON `transaction`.product_id = products.product_id INNER JOIN catagory ON products.catagory_id = catagory.catagory_id WHERE `transaction`.store_id =:id GROUP BY `transaction`.store_id,`transaction`.product_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function stock_product($conn,$id){
        
        $sql="SELECT
        `transaction`.store_id, 
        `transaction`.product_id, 
        sum(purchase) AS purchase, 
        sum(issuse_in) AS issuse_in, 
        sum(issuse_out) AS issuse_out, 
        sum(sold) AS sold, 
        sum(`return`) AS sales_reject, 
        sum(reject) AS purchase_reject, 
        stores.store_name, 
        products.product_name, 
        products.product_sku, 
        catagory.catagory
    FROM
        `transaction`
        INNER JOIN
        stores
        ON 
            `transaction`.store_id = stores.store_id
        INNER JOIN
        products
        ON 
            `transaction`.product_id = products.product_id
        INNER JOIN catagory ON products.catagory_id = catagory.catagory_id WHERE `transaction`.product_id = 1 GROUP BY `transaction`.store_id, `transaction`.product_id";
    }
}

?>