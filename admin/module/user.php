<?php

    class user{

        public static function signin($conn,$request){

            $sql="SELECT * FROM `useraccount` WHERE `username` =? AND `password`=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute($request);
            $output = $stmt->fetch(PDO::FETCH_ASSOC);
            if($output == false){
                $sql="SELECT * FROM `useraccount` WHERE `email` =? AND `password`=?";
                $stmt = $conn->prepare($sql);
                $stmt->execute($request);
                $output = $stmt->fetch(PDO::FETCH_ASSOC);
            }

            return $output;
        }

        public static function add(){

            $sql = "INSERT INTO `useraccount`(`username`, `emaill`, `password`, `mobile`) VALUES (?, ?, ?, ?)";
        }

        public static function update(){

            $sql ="UPDATE `salesbook`.`useraccount` SET `fname` = ?, `username` = ?, `emaill` = ?, `mobile` = ?, `status` = ? WHERE `user_id` = ?";
        }

        public static function change_password(){

            $sql ="UPDATE `useraccount` SET `password` = ? WHERE `user_id` = ?";
        }

        public static function change_status(){
        
            $sql ="UPDATE `salesbook`.`useraccount` SET `status` = 'ss' WHERE `user_id` = ?";
        }
    }


?>