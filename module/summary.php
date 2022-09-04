<?php

class summary{

    public static function TotalPurchase($conn){

        $sql="SELECT sum(`transaction`.price *	`transaction`.purchase) as total FROM `transaction`";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $output = $stmt->fetch(PDO::FETCH_ASSOC);
        if($output == false){
            $amt = 0;
        }else{
            $amt = $output['total'];
        }

        return $amt;
    }

    
    public static function TotalSales($conn){

        $sql="SELECT sum(`transaction`.price *	`transaction`.sold) AS total FROM `transaction`";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $output = $stmt->fetch(PDO::FETCH_ASSOC);
        if($output == false){
            $amt = 0;
        }else{
            $amt = $output['total'];
        }

        return $amt;
    }

    public static function TotalReject($conn){

        $sql="SELECT sum(`transaction`.price *	`transaction`.reject) AS total FROM `transaction`";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $output = $stmt->fetch(PDO::FETCH_ASSOC);
        if($output == false){
            $amt = 0;
        }else{
            $amt = $output['total'];
        }

        return $amt;
    }

    public static function TotalSalesReject($conn){

        $sql="SELECT sum(`transaction`.price *	`transaction`.`return`) AS total FROM `transaction`";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $output = $stmt->fetch(PDO::FETCH_ASSOC);
        if($output == false){
            $amt = 0;
        }else{
            $amt = $output['total'];
        }

        return $amt;
    }

    public static function StoreSummaryTransaction($conn){

        $sql ="SELECT
        `transaction`.store_id, 
        sum(`transaction`.purchase * `transaction`.price) AS purchase, 
        sum(`transaction`.sold * `transaction`.price) AS sales, 
        sum(`transaction`.`return` * `transaction`.price) AS sales_return, 
        sum(`transaction`.reject * `transaction`.price) AS reject, 
        sum(`transaction`.issuse_in * `transaction`.price) as issue_in,
        sum(`transaction`.issuse_out * `transaction`.price) as issue_out,
        stores.store_name
    FROM
        `transaction`
        INNER JOIN
        stores
        ON 
            `transaction`.store_id = stores.store_id
    GROUP BY
        `transaction`.store_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}

?>