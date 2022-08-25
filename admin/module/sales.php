<?php

class sales{

    public static function add_sales(){

        $sql="INSERT INTO `transaction`(`store_id`, `user_id`, `product_id`, `tran_type_id`, `tran_date`, `ref`, `price`, `sold`, `details`) VALUES (1, 1, 1, 1, '2022-08-24', '1', 1, '1', '1')";
    }

    public static function add_return(){

        $sql ="INSERT INTO `transaction`(`store_id`, `user_id`, `product_id`, `tran_type_id`, `tran_date`, `ref`, `price`, `return`) VALUES (1, 1, 1, 1, '2022-08-24', '1', 1, '1')";
    }

    public static function fetch($conn){

        $sql="SELECT
        `transaction`.*, 
        invoice.ref, 
        products.product_name, 
        products.product_sku, 
        stores.store_name, 
        useraccount.fname
    FROM
        `transaction`
        INNER JOIN
        invoice
        ON 
            `transaction`.invoice_id = invoice.invoice_id
        INNER JOIN
        products
        ON 
            `transaction`.product_id = products.product_id
        INNER JOIN
        stores
        ON 
            `transaction`.store_id = stores.store_id
        INNER JOIN
        useraccount
        ON 
            `transaction`.user_id = useraccount.user_id
    WHERE
        `transaction`.tran_type_id = 1";
         $stmt = $conn->prepare($sql);
         $stmt->execute();
         return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function reject($conn){

        $sql="SELECT
        `transaction`.*, 
        invoice.ref, 
        products.product_name, 
        products.product_sku, 
        stores.store_name, 
        useraccount.fname
    FROM
        `transaction`
        INNER JOIN
        invoice
        ON 
            `transaction`.invoice_id = invoice.invoice_id
        INNER JOIN
        products
        ON 
            `transaction`.product_id = products.product_id
        INNER JOIN
        stores
        ON 
            `transaction`.store_id = stores.store_id
        INNER JOIN
        useraccount
        ON 
            `transaction`.user_id = useraccount.user_id
    WHERE
        `transaction`.tran_type_id = 1";
         $stmt = $conn->prepare($sql);
         $stmt->execute();
         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>