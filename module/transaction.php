<?php

class transaction{

    public static function CountInvoice($conn,$id){

        $sql ="SELECT COUNT(invoice.invoice_id) AS total, invoice.type_id FROM invoice WHERE invoice.type_id =:id GROUP BY invoice.type_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        $count = $stmt->fetch(PDO::FETCH_ASSOC);
        if($count == false){
            $output = "0.00";
        }else{
            $output = $count['total'];
        }

        return $output;
    }

    public static function TotalTransactionPerMonth($conn,$id){

        $sql = "SELECT sum(invoice.amount) AS total FROM invoice WHERE invoice.invo_date BETWEEN :StartDate AND :EndDate AND invoice.type_id =:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'StartDate'=>date("Y-m-01"),
            'EndDate'=>date("Y-m-31"),
            ':id'=>$id
        ]);
        $qry = $stmt->fetch(PDO::FETCH_ASSOC);
        if($qry == false){
            $output = "0.00";
        }else{
            $output = $qry['total'];
        }

        return $output;

    }

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

    public static function UpdateInvoicePurchaseTransaction($conn,$id){

        $sql = "SELECT `transaction`.invoice_id, `transaction`.tran_type_id, sum( `transaction`.price * `transaction`.purchase ) AS total, sum( `transaction`.purchase ) AS qty FROM `transaction` WHERE `transaction`.tran_type_id = 1 AND `transaction`.invoice_id =:id GROUP BY `transaction`.tran_type_id,`transaction`.invoice_id";
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

    public static function UpdateInvoicePurchaseRejectTransaction($conn,$id){

        $sql = "SELECT `transaction`.invoice_id, `transaction`.tran_type_id, sum( `transaction`.price * `transaction`.`reject` ) AS total, sum( `transaction`.`reject`) AS qty FROM `transaction` WHERE `transaction`.tran_type_id = 2  AND `transaction`.invoice_id =:id GROUP BY `transaction`.tran_type_id, `transaction`.invoice_id";
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

    public static function InvoicePurchaseSubTotal($conn,$id){

        $sql ="SELECT `transaction`.invoice_id, `transaction`.tran_type_id, sum( `transaction`.price * `transaction`.purchase ) AS total, sum( `transaction`.purchase) AS qty FROM `transaction` WHERE `transaction`.tran_type_id = 1 AND `transaction`.invoice_id =:id GROUP BY `transaction`.tran_type_id,`transaction`.invoice_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        $output = $stmt->fetch(PDO::FETCH_ASSOC);
        if($output == false){
            return 0;
        }else{
            return $output['total'];
        }
    }

    public static function InvoicePurchaseRejectSubTotal($conn,$id){

        $sql ="SELECT `transaction`.invoice_id,`transaction`.tran_type_id, sum(`transaction`.price * `transaction`.`reject`) AS total, sum(`transaction`.`reject`) AS qty FROM `transaction` WHERE `transaction`.tran_type_id = 2 AND `transaction`.invoice_id =:id GROUP BY `transaction`.tran_type_id, `transaction`.invoice_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        $output = $stmt->fetch(PDO::FETCH_ASSOC);
        if($output == false){
            return 0;
        }else{
            return $output['total'];
        }
    }

    public static function UpdateInvoiceIssueTransaction($conn,$type,$id){

        $sql = "SELECT `transaction`.invoice_id, `transaction`.tran_type_id, sum( `transaction`.price * (`transaction`.issuse_in + issuse_out)) AS total, sum((`transaction`.issuse_in + issuse_out)) AS qty FROM `transaction` WHERE `transaction`.tran_type_id =:issuse AND `transaction`.invoice_id =:id GROUP BY `transaction`.tran_type_id,`transaction`.invoice_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':issuse'=>$type,
            ':id'=>$id
        ]);
        $invoice = $stmt->fetch(PDO::FETCH_ASSOC);
        //var_dump($invoice);
        //exit;
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

    public static function InvoiceIssueSubTotal($conn,$type,$id){

        $sql ="SELECT `transaction`.invoice_id, `transaction`.tran_type_id, sum( `transaction`.price * (`transaction`.issuse_in + issuse_out)) AS total, sum((`transaction`.issuse_in + issuse_out)) AS qty FROM `transaction` WHERE `transaction`.tran_type_id =:issuse AND `transaction`.invoice_id =:id GROUP BY `transaction`.tran_type_id,`transaction`.invoice_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'issuse'=>$type,
            ':id'=>$id
        ]);
        $output = $stmt->fetch(PDO::FETCH_ASSOC);
        if($output == false){
            return 0;
        }else{
            return $output['total'];
        }
    }
}
 
?>