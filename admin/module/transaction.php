<?php

class transaction{

    public static function delete($conn,$request){

        $sql = "DELETE FROM `transaction` WHERE `tran_id` =:id";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([':id'=>$request]);

    }

    public static function DeleteInvoice($conn,$request){

        $sql ="DELETE FROM `invoice` WHERE `invoice_id` =:id";
        $stmt = $conn->prepare($sql);
        if(false == $stmt->execute([':id'=>$request])){
            return false;
        }else{
            $sql = "DELETE FROM `transaction` WHERE `invoice_id` =:id";
            $stmt = $conn->prepare($sql);
            return $stmt->execute([':id'=>$request]);
        }
    }

    public static function UpdateInvoiceSalesTransaction($conn,$id){

        $sql = "SELECT `transaction`.invoice_id, `transaction`.tran_type_id, sum( `transaction`.price * `transaction`.sold ) AS total, sum( `transaction`.sold ) AS qty FROM `transaction` WHERE `transaction`.tran_type_id = 3 AND `transaction`.invoice_id =:id GROUP BY `transaction`.tran_type_id,`transaction`.invoice_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        $invoice = $stmt->fetch(PDO::FETCH_ASSOC);
        if($invoice == false){
            $subtotal = 0;
            $discount = 0;
            $tax = 0;
            $amt = 0;
            $qty = 0;
        }else{
            $subtotal = $invoice['total'];
            $discount = 0;
            $tax = 0;
            $amt = $invoice['total'];
            $qty = $invoice['qty'];
        }

        $sql ="UPDATE `invoice` SET `qty` =:qty, `subtotal` =:total, `discount` =:discount, `tax` =:tax, `amount` =:amt WHERE `invoice_id` =:id";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([
            ":qty"=>$qty,
            ":total"=>$subtotal,
            ":discount"=>$discount,
            ":tax"=>$tax,
            ":amt"=>$amt,
            ":id"=>$id
        ]);
    }

    public static function UpdateInvoiceSalesRejectTransaction($conn,$id){

        $sql = "SELECT `transaction`.invoice_id, `transaction`.tran_type_id, sum( `transaction`.price * `transaction`.`return` ) AS total, sum( `transaction`.`return`) AS qty FROM `transaction` WHERE `transaction`.tran_type_id = 4  AND `transaction`.invoice_id =:id GROUP BY `transaction`.tran_type_id, `transaction`.invoice_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        $invoice = $stmt->fetch(PDO::FETCH_ASSOC);
        if($invoice == false){
            $subtotal = 0;
            $discount = 0;
            $tax = 0;
            $amt = 0;
            $qty = 0;
        }else{
            $subtotal = $invoice['total'];
            $discount = 0;
            $tax = 0;
            $amt = $invoice['total'];
            $qty = $invoice['qty'];
        }

        $sql ="UPDATE `invoice` SET `qty` =:qty, `subtotal` =:total, `discount` =:discount, `tax` =:tax, `amount` =:amt WHERE `invoice_id` =:id";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([
            ":qty"=>$qty,
            ":total"=>$subtotal,
            ":discount"=>$discount,
            ":tax"=>$tax,
            ":amt"=>$amt,
            ":id"=>$id
        ]);
    }

    public static function InvoiceSalesSubTotal($conn,$id){

        $sql ="SELECT `transaction`.invoice_id, `transaction`.tran_type_id, sum( `transaction`.price * `transaction`.sold ) AS total, sum( `transaction`.sold ) AS qty FROM `transaction` WHERE `transaction`.tran_type_id = 3 AND `transaction`.invoice_id =:id GROUP BY `transaction`.tran_type_id,`transaction`.invoice_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        $output = $stmt->fetch(PDO::FETCH_ASSOC);
        if($output == false){
            return 0;
        }else{
            return $output['total'];
        }
    }

    public static function InvoiceRejectSubTotal($conn,$id){

        $sql ="SELECT `transaction`.invoice_id,`transaction`.tran_type_id, sum(`transaction`.price * `transaction`.`return`) AS total, sum(`transaction`.`return`) AS qty FROM `transaction` WHERE `transaction`.tran_type_id = 4 AND `transaction`.invoice_id =:id GROUP BY `transaction`.tran_type_id, `transaction`.invoice_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        $output = $stmt->fetch(PDO::FETCH_ASSOC);
        if($output == false){
            return 0;
        }else{
            return $output['total'];
        }
    }
}

?>