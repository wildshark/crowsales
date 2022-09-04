<?php

class transfer{

    public static function get_invoice($conn,$id){

        $sql ="SELECT * FROM `invoice` WHERE `invoice_id`=:id LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
         $stmt->execute([":id"=>$id]);
         return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function get_store($conn,$request){

        $sql ="SELECT * FROM `stores` WHERE `store_id`=:id LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
        $stmt->execute([":id"=>$request]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function get_transfer($conn,$request){

        $sql ="SELECT * FROM `stock_transfer` WHERE `invoice_id`=:id LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
        $stmt->execute([":id"=>$request]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
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

    public static function fetch_main($conn){

        $sql ="SELECT invoice.ref, invoice.qty, invoice.amount, useraccount.fname, stock_transfer.* FROM stock_transfer INNER JOIN invoice ON stock_transfer.invoice_id = invoice.invoice_id INNER JOIN useraccount ON invoice.user_id = useraccount.user_id ORDER BY stock_transfer.issus_id DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function fetch_details($conn){

        $sql ="SELECT `transaction`.*, stock_transfer.from_store_name, stock_transfer.to_store_name FROM `transaction` INNER JOIN stock_transfer ON `transaction`.invoice_id = stock_transfer.invoice_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function add($conn,$request){

        $sql ="INSERT INTO `stock_transfer`(`issus_date`, `from_store_id`, `to_store_id`, `from_store_name`, `to_store_name`,`invoice_id`,`type_id`,`user_id`) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute($request);
    }

    public static function add_issus_out($conn,$request){

        $sql="INSERT INTO `transaction`(`invoice_id`, `store_id`, `user_id`, `tran_type_id`,`product_id`, `tran_date`, `price`, `issuse_out`) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute($request);
    }

    public static function add_issus_in($conn,$request){

        $sql="INSERT INTO `transaction`(`invoice_id`, `store_id`, `user_id`,`tran_type_id`, `product_id`, `tran_date`, `price`, `issuse_in`) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute($request);
    }

    public static function delete($conn,$request){

        $sql="DELETE FROM `stock_transfer` WHERE `invoice_id` =:id";
        $stmt = $conn->prepare($sql);
        $output = $stmt->execute([":id"=>$request]);

        $sql="DELETE FROM `transaction` WHERE `invoice_id` =:id";
        $stmt = $conn->prepare($sql);
        $output = $stmt->execute([":id"=>$request]);
        
        $sql="DELETE FROM `invoice` WHERE `invoice_id` =:id";
        $stmt = $conn->prepare($sql);
        $output = $stmt->execute([":id"=>$request]);

        return $output;

    }

    public static function delete_details($conn,$request){

        $sql ="DELETE FROM `transaction` WHERE `tran_id` =:id";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([":id"=>$request]);
    }

    public static function list_details_issuse_in($conn,$id){
        $sql ="SELECT `transaction`.tran_id, `transaction`.invoice_id, `transaction`.product_id, products.product_name, products.product_sku, `transaction`.issuse_in,`transaction`.price,(`transaction`.price * `transaction`.issuse_in) as amt, `transaction`.details FROM `transaction` INNER JOIN products ON `transaction`.product_id = products.product_id WHERE `transaction`.invoice_id =:id ";
        $stmt = $conn->prepare($sql);
        $stmt->execute([":id"=>$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function list_details_issuse_out($conn,$id){
        $sql ="SELECT `transaction`.tran_id, `transaction`.invoice_id, `transaction`.product_id, products.product_name, products.product_sku, `transaction`.issuse_out,`transaction`.price,(`transaction`.price * `transaction`.issuse_out) as amt, `transaction`.details FROM `transaction` INNER JOIN products ON `transaction`.product_id = products.product_id WHERE `transaction`.invoice_id =:id ";
        $stmt = $conn->prepare($sql);
        $stmt->execute([":id"=>$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>