<?php
session_start();
include("control/control.php");
include("control/function.php");
include("control/global.php");

include("module/user.php");
include("module/store.php");
include("module/product.php");
include("module/catagory.php");
include("module/brand.php");
include("module/sales.php");
include("module/purchase.php");

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
                    $view ="views/dashboard.php";
                break;

                case"userlist";
                    $data = user::fetch($conn);
                    $view ="views/user.php";  
                break;

                case"storelist";
                    $data = store::fetch($conn);
                    $view ="views/store.php";  
                break;

                case"productlist";
                    $data = product::fetch($conn);
                    $view ="views/product.php";
                break;

                case"categorylist";
                    $page['title'] ="Catagory List";
                    $page['subtitle']= "Manage your Product Catagory";
                    $page['type'] = "Catagory";
                    $table_title="<tr>
                    <th>#</th>
                    <th>Catagory</th>
                    <th>Products</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>";
                    $data = catagory::fetch($conn);
                    $view = "views/catagory.php";
                break;

                case"brandlist";
                    $data = brand::fetch($conn);
                    $view = "views/brand.php";
                break;

                case"saleslist";
                    $data = sales::fetch($conn);
                    $view = "views/sales.php";
                break;

                case"salesreturnlists";
                    $data = sales::reject($conn);
                    $view = "views/sales.reject.php";
                break;

                case"purchaselist";
                    $data = purchase::fetch($conn);
                    $view = "views/purchase.php";
                break;

                case"purchasereturnlists";
                    $data = purchase::reject($conn);
                    $view = "views/purchase.reject.php";
                break;


            }

            if($_REQUEST['main'] ==="dashboard"){
                require("frame/dashboard.php");
            }else{
                require("frame/frame.php");
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
    $conn=null;
}
?>