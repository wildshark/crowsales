<?php

class purchase{

    
    public static function fetch_inovices($conn){

        $sql ="SELECT invoice.*, useraccount.fname, useraccount.username, stores.store_name FROM invoice INNER JOIN useraccount ON invoice.user_id = useraccount.user_id INNER JOIN stores ON invoice.store_id = stores.store_id WHERE invoice.type_id = 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function fetch_reject_inovices($conn){

        $sql ="SELECT invoice.*, useraccount.fname, useraccount.username, stores.store_name FROM invoice INNER JOIN useraccount ON invoice.user_id = useraccount.user_id INNER JOIN stores ON invoice.store_id = stores.store_id WHERE invoice.type_id = 2";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function add_main($conn,$request){

        $sql ="INSERT INTO `invoice`(`store_id`, `user_id`, `type_id`, `invo_date`, `ref`, `details`) VALUES (?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $output = $stmt->execute($request);
        if($output == false){
            return false;
        }else{
            return $conn->lastInsertId();
        }
    }

    public static function get_invoice($conn,$id){

        $sql ="SELECT * FROM `invoice` WHERE `invoice_id`=:id LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
         $stmt->execute([":id"=>$id]);
         return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function add_details_purchase($conn,$request){

        $sql="INSERT INTO `transaction`(`invoice_id`, `store_id`, `user_id`,`tran_type_id`, `product_id`,  `tran_date`, `price`, `purchase`) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute($request);
    }

    public static function add_details_reject($conn,$request){

        $sql="INSERT INTO `transaction`(`invoice_id`, `store_id`, `user_id`, `tran_type_id`, `product_id`,  `tran_date`, `price`, `reject`) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute($request);
    }

    public static function list_details_purchase($conn,$id){
        $sql ="SELECT `transaction`.tran_id, `transaction`.invoice_id, `transaction`.product_id, products.product_name, products.product_sku, `transaction`.purchase,`transaction`.price,(`transaction`.price * `transaction`.purchase) as amt, `transaction`.details FROM `transaction` INNER JOIN products ON `transaction`.product_id = products.product_id WHERE `transaction`.invoice_id =:id ";
        $stmt = $conn->prepare($sql);
        $stmt->execute([":id"=>$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function list_details_reject($conn,$id){
        $sql ="SELECT `transaction`.tran_id, `transaction`.invoice_id, `transaction`.product_id, products.product_name, products.product_sku, `transaction`.`reject`,`transaction`.price, (`transaction`.price * `transaction`.`reject`) as amt, `transaction`.details FROM `transaction` INNER JOIN products ON `transaction`.product_id = products.product_id WHERE `transaction`.invoice_id =:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([":id"=>$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function purchase_book($conn){

        $sql="SELECT `transaction`.*, useraccount.fname, useraccount.username, stores.store_name, products.product_name, products.product_sku, invoice.ref FROM `transaction` INNER JOIN useraccount ON `transaction`.user_id = useraccount.user_id INNER JOIN stores ON `transaction`.store_id = stores.store_id INNER JOIN products ON `transaction`.product_id = products.product_id INNER JOIN invoice ON `transaction`.invoice_id = invoice.invoice_id WHERE `transaction`.tran_type_id = 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function reject_book($conn){

        $sql="SELECT `transaction`.*, useraccount.fname, useraccount.username, stores.store_name, products.product_name, products.product_sku, invoice.ref FROM `transaction` INNER JOIN useraccount ON `transaction`.user_id = useraccount.user_id INNER JOIN stores ON `transaction`.store_id = stores.store_id INNER JOIN products ON `transaction`.product_id = products.product_id INNER JOIN invoice ON `transaction`.invoice_id = invoice.invoice_id WHERE `transaction`.tran_type_id = 2";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function TotalPurchase($conn,$request){
        $sql ="SELECT `transaction`.tran_type_id, sum(`transaction`.price * `transaction`.purchase) AS total FROM `transaction` WHERE `transaction`.tran_type_id = 1 GROUP BY `transaction`.tran_type_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function TotalReject($conn,$request){
        $sql ="SELECT `transaction`.tran_type_id, sum(`transaction`.price * `transaction`.`reject`) AS total FROM `transaction` WHERE `transaction`.tran_type_id = 2 GROUP BY `transaction`.tran_type_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}
?>