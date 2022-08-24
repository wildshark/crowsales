<?php
session_start();
include("control/control.php");
include("control/function.php");
include("control/global.php");

include("module/user.php");
include("module/store.php");

if(!isset($_REQUEST['submit'])){
    if(!isset($_REQUEST['main'])){
        require("frame/login.php");
    }else{
        if($_GET['token'] !== GenToken($_SESSION['usrID'],$_SESSION['strID'])){
            header("location: ?token=false");
        }else{
            $_SESSION['token'] = $_GET['token'];
            switch($_REQUEST['main']){

                case"dashboard";
                    require("frame/dashboard.php");
                break;

                case"user";
                    if($_REQUEST['ui'] ==="list"){
                        require("frame/table.php");
                    }
                break;
            }
        }
    }
}else{

    switch($_REQUEST['submit']){

        case"login";
            $q[] = $_REQUEST['usr'];
            $q[] = $_REQUEST['pwd'];
            $response = user::signin($conn,$q);
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
    
}
?>