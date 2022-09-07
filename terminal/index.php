<?php
session_start();
include("control/control.php");
include("control/function.php");
include("control/global.php");

include("../module/user.php");
include("../module/store.php");
include("../module/product.php");
include("../module/catagory.php");
include("../module/brand.php");
include("../module/sales.php");
include("../module/purchase.php");
include("../module/transaction.php");
include("../module/inventory.php");
include("../module/transfer.php");
include("../module/summary.php");


if(!isset($_REQUEST['submit'])){
    if(!isset($_REQUEST['main'])){
        require("frame/login.php");
        exit();
    }else{
        switch($_REQUEST['main']){

            case"dashboard";
                $content = "view/dashboard.php";
            break;
        }
        require("frame/frame.php");
    }
}else{

    switch($_REQUEST['submit']){

        case"sign-in";
            $q[] = $_REQUEST['username'];
            $q[] = $_REQUEST['password'];
            var_dump($q);
            $response = user::signin($conn,$q);
            var_dump($response);
            exit;
            if($response == false){
                $url = array(
                    "user"=>false,
                );
            }else{
                $store = store::user_access($conn,$response['user_id']);
                if($store == false){
                    $url = array(
                        "store"=>false,
                    );
                }else{
                    
                    $_SESSION['usrID'] = $response['user_id'];
                    $_SESSION['strID'] = $store['store_id'];
                    $token = GenToken($response['user_id'],$store['store_id']);
                    setcookie("username",$response['username']);
                    setcookie("fullname",$response['fname']);
                    setcookie("user_role",$response['role']);
                    setcookie("token",$token);
                    $url = array(
                        "main"=>"dashboard",
                        "token"=>$token
                    );
                } 
            }
        break;
    }
    header("location: ?".http_build_query($url));
    $conn=null;
}
?>