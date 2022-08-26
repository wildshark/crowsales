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
        session_destroy();
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

                case"user";
                    if($_REQUEST['ui'] === "list"){
                        $data = user::fetch($conn);
                        $view ="views/user/user.php";     
                    }elseif($_REQUEST['ui'] === "edit"){
                        $data = user::view($conn,$_GET['id']);
                        if($data == false){
                            $fname = "";
                            $username = "";
                            $email = "";
                            $mobile = "";
                            $password = "";
                            $status = "";
                            $role = "";
                            $storeID = "";
                            $store = "";
                        }else{
                            $_SESSION['record_id'] = $data['user_id'];
                            $fname = $data['fname'];
                            $username = $data['username'];
                            $email = $data['email'];
                            $mobile = $data['mobile'];
                            $password = $data['password'];
                            $status = $data['status'];
                            $role = $data['role'];
                            $store = $data['store_name'];
                            $storeID = $data['store_id'];
                        }
                        $view ="views/user/edit.php";
                    }
                break;

                case"store";
                    if($_REQUEST['ui'] === "list"){
                        $data = store::fetch($conn);
                        $view ="views/store/store.php";  
                    }elseif($_REQUEST['ui'] === "edit"){
                        $_SESSION['record_id'] = $_GET['id'];
                        $data = store::view($conn,$_GET['id']);
                        if($data == false){
                            $name = "";
                            $address = "";
                            $mobile = "";
                            $email = "";
                            $status = "";
                        }else{
                            $name = $data['store_name'];
                            $address = $data['store_address'];
                            $mobile = $data['mobile'];
                            $email = $data['email'];
                            $status = $data['status'];
                            $_SESSION['record_id'] = $data['store_id'];
                        }
                        $view ="views/store/edit.php";
                    }
                break;

                case"product";
                    if($_REQUEST['ui'] ==="list"){
                        $data = product::fetch($conn);
                        $view ="views/product/product.php";
                    }elseif($_REQUEST['ui'] ==="edit"){
                        $data = product::view($conn,$_GET['id']);
                        if($data == false){
                            $catagoryID = "";
                            $brandID = "";
                            $name = "";
                            $sku = "";
                            $details = "";
                            $discount = "0";
                            $price = "0.00";
                            $status = "";
                            $brand = "";
                            $tax = "0";
                            $catagory = "";
                        }else{
                            $_SESSION['record_id'] = $data['product_id'];
                            $catagoryID = $data['catagory_id'];
                            $brandID = $data['brand_id'];
                            $name = $data['product_name'];
                            $sku = $data['product_sku'];
                            $details = $data['description'];
                            $discount = $data['discount'];
                            $tax = $data['tax'];
                            $price = $data['price'];
                            $status = $data['status'];
                            $brand = $data['brand'];
                            $catagory = $data['catagory'];
                        }
                        $view ="views/product/edit.php";
                    }
                break;

                case"catagory";
                    if($_REQUEST['ui']==="list"){
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
                        $view = "views/catagory/catagory.php";
                    }elseif($_REQUEST['ui']==="edit"){
                        $data = catagory::view($conn,$_GET['id']);
                        if($data == false){
                            $catagory = "";
                            $status = "";
                        }else{
                            $catagory = $data['catagory'];
                            $status = $data['status'];
                            $_SESSION['record_id'] = $data['catagory_id'];
                        }
                        $view = "views/catagory/edit.php";
                    }
                break;

                case"brand";
                    if($_REQUEST['ui'] === "list"){
                        $data = brand::fetch($conn);
                        $view = "views/brand/brand.php";
                    }elseif($_REQUEST['ui'] === "add"){
                        $data = brand::view($conn,$_GET['id']);
                        if($data == false){
                            $brand ="";
                            $status="";
                        }else{
                            $_SESSION['record_id'] = $data['brand_id'];
                            $brand = $data['brand'];
                            $status = $data['status'];
                        }
                        $view = "views/brand/edit.php";
                    }
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
//var_dump($_REQUEST);
//exit;
    $submit = explode("-",$_REQUEST['submit']);
    $command = $submit[0];
    $action = $submit[1];
    switch($command){

        case"user";
            if($action === "login"){
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
            }elseif($action === "add"){
                $q[] = $_REQUEST['asign'];
                $q[] = $_REQUEST['name'];
                $q[] = $_REQUEST['username'];
                $q[] = $_REQUEST['email'];
                $q[] = $_REQUEST['password'];
                $q[] = $_REQUEST['mobile'];
                if(false == user::add($conn,$q)){
                    $url = array(
                        "main"=>"dashboard",
                        "token"=>$_COOKIE['token'],
                        "er"=>100
                    );
                }else{
                    $url = array(
                        "main"=>"user",
                        "ui"=>"list",
                        "token"=>$_COOKIE['token'],
                        "er"=>200
                    );
                }
            }elseif($action === "update"){
                $q[] = $_REQUEST['asign'];
                $q[] = $_REQUEST['name'];
                $q[] = $_REQUEST['username'];
                $q[] = $_REQUEST['email'];
                $q[] = $_REQUEST['password'];
                $q[] = $_REQUEST['mobile'];
                $q[] = $_REQUEST['role'];
                $q[] = $_REQUEST['status'];
                $q[] = $_SESSION['record_id'];
                $response = user::update($conn,$q);
                if($response == false){
                    $url = array(
                        "main"=>"dashboard",
                        "token"=>$_COOKIE['token'],
                        "er"=>100
                    );
                }else{
                    $url = array(
                        "main"=>"user",
                        "ui"=>"edit",
                        "id"=>$_SESSION['record_id'],
                        "token"=>$_COOKIE['token'],
                        "er"=>200
                    );
                }
            }elseif($action === "delete"){
                if(false == user::delete($conn,$_GET['id'])){
                    $url = array(
                        "main"=>"user",
                        "ui"=>"list",
                        "token"=>$_COOKIE['token'],
                        "er"=>100
                    );
                }else{
                    $url = array(
                        "main"=>"user",
                        "ui"=>"list",
                        "token"=>$_COOKIE['token'],
                        "er"=>200
                    );
                }
            }
        break;

        case"brand";
            if($action === "add"){
                $q[] = $_REQUEST['name'];
                $response = brand::add($conn,$q);
                var_dump($response);
                exit;
            }elseif($action === "update"){
                $q[] = $_REQUEST['name'];
                $q[] = $_REQUEST['status'];
                $q[] = $_SESSION['record_id'];
                $response = brand::update($conn,$q);
            }elseif($action === "delete"){
                $q[] = $_REQUEST['id'];
                $response = brand::delete($conn,$q);
            }
        break;

        case"catagory";
            if($action === "add"){
                $q[] = $_REQUEST['name'];
                if(false == catagory::add($conn,$q)){
                    $url = array(
                        "main"=>"catagory",
                        "ui"=>"list",
                        "token"=>$_COOKIE['token'],
                        "er"=>100
                    );                    
                }else{
                    $url = array(
                        "main"=>"catagory",
                        "ui"=>"list",
                        "token"=>$_COOKIE['token'],
                        "er"=>200
                    );
                }
                
            }elseif($action === "update"){
                $q[] = $_REQUEST['name'];
                $q[] = $_REQUEST['status'];
                $q[] = $_SESSION['record_id'];
                if(false == catagory::update($conn,$q)){
                    $url = array(
                        "main"=>"catagory",
                        "ui"=>"list",
                        "token"=>$_COOKIE['token'],
                        "er"=>100
                    );
                }else{
                    $url = array(
                        "main"=>"catagory",
                        "ui"=>"list",
                        "id"=>$_SESSION['record_id'],
                        "token"=>$_COOKIE['token'],
                        "er"=>200
                    );
                }
            }elseif($action === "delete"){
                if(false == catagory::delete($conn,$_GET['id'])){
                    $url = array(
                        "main"=>"catagory",
                        "ui"=>"list",
                        "token"=>$_COOKIE['token'],
                        "er"=>100
                    );
                }else{
                    $url = array(
                        "main"=>"catagory",
                        "ui"=>"list",
                        "token"=>$_COOKIE['token'],
                        "er"=>200
                    );
                }
            }
        break;

        case"product";
            if($action === "add"){
                $q[] = $_REQUEST['catagory'];
                $q[] = $_REQUEST['brand'];
                $q[] = $_REQUEST['product-name'];
                $q[] = $_REQUEST['product-sku'];
                $q[] = $_REQUEST['note'];
                $q[] = $_REQUEST['discount'];
                $q[] = $_REQUEST['price'];
                $q[] = $_REQUEST['tax'];
                if(false == product::add($conn,$q)){
                    $url = array(
                        "main"=>"product",
                        "ui"=>"list",
                        "token"=>$_COOKIE['token'],
                        "er"=>100
                    );
                }else{
                    $url = array(
                        "main"=>"product",
                        "ui"=>"list",
                        "token"=>$_COOKIE['token'],
                        "er"=>200
                    );
                }
            }elseif($action === "update"){
                $q[] = $_REQUEST['catagory'];
                $q[] = $_REQUEST['brand'];
                $q[] = $_REQUEST['product-name'];
                $q[] = $_REQUEST['product-sku'];
                $q[] = $_REQUEST['note'];
                $q[] = $_REQUEST['discount'];
                $q[] = $_REQUEST['price'];
                $q[] = $_REQUEST['tax'];
                $q[] = $_REQUEST['status'];
                $q[] = $_SESSION['record_id'];
                if(false == product::update($conn,$q)){
                    $url = array(
                        "main"=>"product",
                        "ui"=>"list",
                        "id"=>$_SESSION['record_id'],
                        "token"=>$_COOKIE['token'],
                        "er"=>100
                    );
                }else{
                    $url = array(
                        "main"=>"product",
                        "ui"=>"edit",
                        "id"=>$_SESSION['record_id'],
                        "token"=>$_COOKIE['token'],
                        "er"=>200
                    );
                }
            }elseif($action === "delete"){
                if(false == product::delete($conn,$_REQUEST['id'])){
                    $url = array(
                        "main"=>"product",
                        "ui"=>"list",
                        "token"=>$_COOKIE['token'],
                        "er"=>200
                    );
                }else{
                    $url = array(
                        "main"=>"product",
                        "ui"=>"list",
                        "token"=>$_COOKIE['token'],
                        "er"=>100
                    );
                }

            }
        break;

        case"store";
            if($action ==="add"){
                $q[] = $_REQUEST['name'];
                $q[] = $_REQUEST['address'];
                $q[] = $_REQUEST['mobile'];
                $q[] = $_REQUEST['email'];
                if(false == store::add($conn,$q)){
                    $url = array(
                        "main"=>"store",
                        "ui"=>"list",
                        "token"=>$_COOKIE['token'],
                        "er"=>100
                    );
                }else{
                    $url = array(
                        "main"=>"store",
                        "ui"=>"list",
                        "token"=>$_COOKIE['token'],
                        "er"=>200
                    );
                }
            }elseif($action ==="update"){
                $q[] = $_REQUEST['name'];
                $q[] = $_REQUEST['address'];
                $q[] = $_REQUEST['mobile'];
                $q[] = $_REQUEST['email'];
                $q[] = $_REQUEST['status'];
                $q[] = $_SESSION['record_id'];
                if(false == store::update($conn,$q)){
                    $url = array(
                        "main"=>"store",
                        "ui"=>"list",
                        "token"=>$_COOKIE['token'],
                        "er"=>100
                    );
                }else{
                    $url = array(
                        "main"=>"store",
                        "ui"=>"edit",
                        "id"=>$_SESSION['record_id'],
                        "token"=>$_COOKIE['token'],
                        "er"=>200
                    );
                }
            }elseif($action ==="delete"){
                if(false == store::delete($conn,$_REQUEST['id'])){
                    $url = array(
                        "main"=>"store",
                        "ui"=>"list",
                        "token"=>$_COOKIE['token'],
                        "er"=>100
                    );
                }else{
                    $url = array(
                        "main"=>"store",
                        "ui"=>"list",
                        "token"=>$_COOKIE['token'],
                        "er"=>200
                    );
                }
            }
        break;

        case"invoice";
            if($action ==="add"){
                $q[] = $_SESSION['storeID'];
                $q[] = $_SESSION['usrID'];
                $q[] = $_SESSION['typeID'];
                $q[] = $_REQUEST['date'];
                $q[] = $_REQUEST['ref'];
                $q[] = $_REQUEST['details'];
            }elseif($action ==="update"){
                $q[] = $_REQUEST['date'];
                $q[] = $_REQUEST['ref'];
                $q[] = $_REQUEST['details'];
                $q[] = $_SESSION['record_id'];
            }elseif($action ==="delete"){

            }
        break;

        case"test";
            if($action ==="add"){

            }elseif($action ==="update"){

            }elseif($action ==="delete"){

            }
        break;

        case"test";
            if($action ==="add"){

            }elseif($action ==="update"){

            }elseif($action ==="delete"){

            }
        break;
    }

    header("location: ?".http_build_query($url));
    $conn=null;
}
?>