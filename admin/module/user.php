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

        public static function fetch($conn){

            $sql ="SELECT * FROM `useraccount` LIMIT 0,1000";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }

        public static function view($conn,$request){

            $sql ="SELECT * FROM `useraccount` WHERE `user_id`=:id LIMIT 0,1000";
            $stmt = $conn->prepare($sql);
            $stmt->execute([":id"=>$request]);
            return $stmt->fetch(PDO::FETCH_ASSOC);

        }

        public static function add($conn,$request){

            $sql = "INSERT INTO `useraccount`(`store_id`, `fname`, `username`, `email`, `password`, `mobile`) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if(false == $stmt->execute($request)){
                $output = false;
            }else{
                $id = $conn->lastInsertId();
                $sql ="INSERT INTO `user_store_access`(`store_id`, `user_id`) VALUES (?,?)";
                $stmt = $conn->prepare($sql);
                $output = $stmt->execute([
                    ":store"=>$request[0],
                    ":id"=>$id
                ]);
            };

            return $output;
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

        public static function delete($conn,$request){

            $sql ="UPDATE `useraccount` SET `status` = 'Delete' WHERE `user_id` =:id";
            $stmt = $conn->prepare($sql);
            $stmt->execute([":id"=>$request]);
        }
    }


?>