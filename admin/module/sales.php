<?php

class sales{

    public static function add_sales(){

        $sql="INSERT INTO `transaction`(`store_id`, `user_id`, `product_id`, `tran_type_id`, `tran_date`, `ref`, `price`, `sold`, `details`) VALUES (1, 1, 1, 1, '2022-08-24', '1', 1, '1', '1')";
    }

    public static function add_return(){

        $sql ="INSERT INTO `transaction`(`store_id`, `user_id`, `product_id`, `tran_type_id`, `tran_date`, `ref`, `price`, `return`) VALUES (1, 1, 1, 1, '2022-08-24', '1', 1, '1')";
    }
}

?>