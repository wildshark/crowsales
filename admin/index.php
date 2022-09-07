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

/*
1 purchase,
2 reject
3 sold
4 return
5 transfer-in
6 transfer-out
*/
$currency = "GHS";

if(!isset($_REQUEST['submit'])){
    if(!isset($_REQUEST['print'])){
        if(!isset($_REQUEST['main'])){
        session_destroy();
        require("frame/login.php");

        }else{
            if($_GET['token'] !== GenToken($_SESSION['usrID'],$_SESSION['strID'])){
                header("location: ?token=false");
            }else{
                $_SESSION['token'] = $_GET['token'];
                if(!isset($_REQUEST['ui'])){
                    $_SESSION['ui'] ="";
                }else{
                    $_SESSION['ui'] = $_REQUEST['ui'];
                }
                switch($_REQUEST['main']){

                    case"dashboard";
                        $total_supply_invoice = transaction::CountInvoice($conn,1);
                        $total_sales_invoice = transaction::CountInvoice($conn,3);

                        $total_supply_amt = transaction::TotalTransactionPerMonth($conn,1);
                        $total_sales_amt = transaction::TotalTransactionPerMonth($conn,3);

                        $getTotalPurchase = summary::TotalPurchase($conn);
                        $getTotalSales = summary::TotalSales($conn);
                        $getTotalRejct = summary::TotalReject($conn);
                        $getTotalSalesReject = summary::TotalSalesReject($conn);
                        $getStoreTransaction = summary::StoreSummaryTransaction($conn);
                        $getTotalPurchase = $getTotalPurchase - $getTotalRejct;
                        $getNetProfit = ($getTotalPurchase + $getTotalSalesReject) - $getTotalSales;
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
                                $selling_price = "0.00";
                                $purchase_price = "0.00";
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
                                $purchase_price = $data['purchase_price'];
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
                        }elseif($_REQUEST['ui'] === "edit"){
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

                    case"sales";
                        if($_REQUEST['ui'] ==="list"){
                            $view = "views/sales/main.php";
                        }elseif($_REQUEST['ui']==="details"){
                            $_SESSION['invoiceID'] = $_GET['id'];
                            $invoice = sales::get_invoice($conn,$_GET['id']);
                            if($invoice == false){
                                $date = "";
                                $ref = "";
                            }else{
                                $date = $invoice['invo_date'];
                                $ref = $invoice['ref'];
                                setcookie("InvoiceDate",$date);
                            }
                            $update = transaction::UpdateInvoiceSalesTransaction($conn,$_GET['id']);
                            $subTotal = transaction::InvoiceSalesSubTotal($conn,$_GET['id']);
                            $view = "views/sales/invoice.php";
                        }elseif($_REQUEST['ui'] ==="salesbook"){
                            $view = "views/sales/details.php";
                        }elseif($_REQUEST['ui'] === "reject"){
                            $view = "views/sales/reject.main.php";
                        }elseif($_REQUEST['ui']==="reject-details"){
                            $_SESSION['invoiceID'] = $_GET['id'];
                            $invoice = sales::get_invoice($conn,$_GET['id']);
                            if($invoice == false){
                                $date = "";
                                $ref = "";
                            }else{
                                $date = $invoice['invo_date'];
                                $ref = $invoice['ref'];
                                setcookie("InvoiceDate",$date);
                            }
                            $update = transaction::UpdateInvoiceSalesRejectTransaction($conn,$_GET['id']);
                            $subTotal = transaction::InvoiceRejectSubTotal($conn,$_GET['id']);
                            $view = "views/sales/reject.details.php";
                        }elseif($_REQUEST['ui']==="rejectlist"){
                            $view = "views/sales/sales.reject.php";
                        }
                    break;

                    case"purchase";
                        if($_REQUEST['ui'] ==="list"){
                            $view = "views/purchase/main.php";
                        }elseif($_REQUEST['ui']==="details"){
                            $_SESSION['invoiceID'] = $_GET['id'];
                            $invoice = sales::get_invoice($conn,$_GET['id']);
                            if($invoice == false){
                                $date = "";
                                $ref = "";
                            }else{
                                $date = $invoice['invo_date'];
                                $ref = $invoice['ref'];
                                setcookie("InvoiceDate",$date);
                            }
                            $update = transaction::UpdateInvoicePurchaseTransaction($conn,$_GET['id']);
                            $subTotal = transaction::InvoicePurchaseSubTotal($conn,$_GET['id']);
                            $view = "views/purchase/invoice.php";
                        }elseif($_REQUEST['ui'] ==="purchasebook"){
                            $view = "views/purchase/details.php";
                        }elseif($_REQUEST['ui'] === "reject"){
                            $view = "views/purchase/reject.main.php";
                        }elseif($_REQUEST['ui']==="reject-details"){
                            $_SESSION['invoiceID'] = $_GET['id'];
                            $invoice = sales::get_invoice($conn,$_GET['id']);
                            if($invoice == false){
                                $date = "";
                                $ref = "";
                            }else{
                                $date = $invoice['invo_date'];
                                $ref = $invoice['ref'];
                                setcookie("InvoiceDate",$date);
                            }
                            $update = transaction::UpdateInvoicePurchaseRejectTransaction($conn,$_GET['id']);
                            $subTotal = transaction::InvoiceRejectSubTotal($conn,$_GET['id']);
                            $view = "views/purchase/reject.details.php";
                        }elseif($_REQUEST['ui']==="rejectlist"){
                            $view = "views/purchase/purchase.reject.php";
                        }
                    break;

                    case"inventory";
                        if($_REQUEST['frm'] ==="stock"){
                            $page_title = "Inventory";
                            $page_sub_title ="All products";
                            $thead ="<tr>
                            <th>#</th>
                            <th>SKU</th>  
                            <th>Product</th>
                            <th>Brand</th>
                            <th>Catagory</th>                   
                            <th>Bal</th>
                            </tr>";
                            $tbody = GenStockInventoryData($conn);
                            $view = "views/inventory/stock.php";
                        }elseif($_REQUEST['frm'] === "store"){
                            if($_REQUEST['ui'] === "store-main"){
                                $page_title ="Store Inventories";
                                $page_sub_title ="Inventory summary for all store(s)";
                                $thead="<tr>
                                <th>#</th>
                                <th>Store Name</th>
                                <th>Stock</th>
                                <th>Action</th>
                                </tr>";
                                $tbody = StoreInventoryMenu($conn);
                                $view = "views/inventory/stock.php";
                            }elseif($_REQUEST['ui'] === "store-details"){
                                $page_title = "Store :".$_GET['store'];
                                $page_sub_title = "Store ".$_GET['store']." Total Stock ".$_GET['bal'];
                                $thead ="<tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Purchase</th>
                                <th>Purchase reject</th>
                                <th>Issus In</th>
                                <th>Issus Out</th>
                                <th>Sold</th>
                                <th>Sold Return</th>                            
                                <th>Bal</th>
                                </tr>";
                                $tbody = StoreInventoryData($conn);
                                $view = "views/inventory/stock.php";
                            }
                        }elseif($action ==="product"){
                            
                        }

                    break;

                    case"transfer";
                        if($_REQUEST['ui'] === "list"){
                            $view = "views/transfer/main.php";
                        }elseif($_REQUEST['ui'] ==="details"){
                            $_SESSION['invoiceID'] = $_GET['id'];
                            $invoice = transfer::get_invoice($conn,$_GET['id']);
                            if($invoice == false){
                                $date = "";
                                $ref = "";
                            }else{
                                $date = $invoice['invo_date'];
                                $ref = $invoice['ref'];
                                $transfer = transfer::get_transfer($conn,$_GET['id']);
                                setcookie("InvoiceDate",$date);
                                setcookie("type_id",$_GET['type']);
                            }
                            if($_GET["type"] == 5){
                                $_StockDetails = InvoiceIssusInData($conn);
                            }elseif($_GET["type"] ==6){
                                $_StockDetails = InvoiceIssusOutData($conn);
                            }
                            $update = transaction::UpdateInvoiceIssueTransaction($conn,$_GET['type'],$_GET['id']);
                            $subTotal = transaction::InvoiceIssueSubTotal($conn,$_GET['type'],$_GET['id']);
                            $view = "views/transfer/details.php";
                        }elseif($_REQUEST['ui'] === "listdetails"){
                            
                        }
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
        switch($_REQUEST['print']){

            case"sales-invoice";
                $inv = sales::get_invoice($conn,$_GET['id']);
                $client = json_decode($inv['details'],true);
                $data = sales::list_details_sold($conn,$_GET['id']);
                $update = transaction::UpdateInvoiceSalesTransaction($conn,$_GET['id']);
                $subTotal = transaction::InvoiceSalesSubTotal($conn,$_GET['id']);
                require("print/print.invoice.php");
            break;
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
                $q[] = $_REQUEST['username'];
                $q[] = $_REQUEST['password'];
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
                if(false == brand::add($conn,$q)){
                    $url = array(
                        "main"=>"brand",
                        "ui"=>"list",
                        "token"=>$_COOKIE['token'],
                        "er"=>100
                    );
                }else{
                    $url = array(
                        "main"=>"brand",
                        "ui"=>"list",
                        "token"=>$_COOKIE['token'],
                        "er"=>200
                    );
                }
            }elseif($action === "update"){
                $q[] = $_REQUEST['name'];
                $q[] = $_REQUEST['status'];
                $q[] = $_SESSION['record_id'];
                if(false == brand::update($conn,$q)){
                    $url = array(
                        "main"=>"brand",
                        "ui"=>"list",
                        "token"=>$_COOKIE['token'],
                        "er"=>100
                    );
                }else{
                    $url = array(
                        "main"=>"brand",
                        "ui"=>"list",
                        "id"=>$_SESSION['record_id'],
                        "token"=>$_COOKIE['token'],
                        "er"=>200
                    );
                }
            }elseif($action === "delete"){
                if(false == brand::delete($conn,$_REQUEST['id'])){
                    $url = array(
                        "main"=>"brand",
                        "ui"=>"list",
                        "token"=>$_COOKIE['token'],
                        "er"=>100
                    );
                }else{
                    $url = array(
                        "main"=>"brand",
                        "ui"=>"list",
                        "token"=>$_COOKIE['token'],
                        "er"=>200
                    );
                }
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
                $q[] = $_REQUEST['purchase_price'];
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
                $q[] = $_REQUEST['purchase_price'];
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

        case"sales";
            if($action ==="main"){
                if($submit[2] === "add"){
                    $q[] = $_SESSION['strID'];
                    $q[] = $_SESSION['usrID'];
                    $q[] = 3;
                    $q[] = date("Y-m-d",strtotime($_REQUEST['date']));
                    $q[] = $_REQUEST['ref'];
                    $q[] = json_encode([
                        "client"=>$_REQUEST['name'],
                        "mobile"=>$_REQUEST['mobile'],
                        "email"=>$_REQUEST['email'],
                        "address"=>$_REQUEST['address']
                    ]);
                    $response = sales::add_main($conn,$q);
                    if($response == false){
                        $url = array(
                            "main"=>"sales",
                            "ui"=>"list",
                            "token"=>$_COOKIE['token'],
                            "er"=>100
                        );
                    }else{
                        $url = array(
                            "main"=>"sales",
                            "ui"=>"details",
                            "id"=>$response,
                            "token"=>$_COOKIE['token'],
                            "er"=>200
                        );
                    }
                }elseif($submit[2] === "delete"){
                    if(false == transaction::DeleteInvoice($conn,$_GET['id'])){
                        $url = array(
                            "main"=>"sales",
                            "ui"=>"list",
                            "token"=>$_COOKIE['token'],
                            "er"=>100
                        );
                    }else{
                        $url = array(
                            "main"=>"sales",
                            "ui"=>"list",
                            "token"=>$_COOKIE['token'],
                            "er"=>200
                        );
                    }
                }
            }elseif($action === "details"){
                if($submit[2] === "add"){
                    $q[] = $_SESSION['invoiceID'];
                    $q[] = $_SESSION['strID'];
                    $q[] = $_SESSION['usrID'];
                    $q[] = 3;
                    if((!isset($_REQUEST['price']))||($_REQUEST['price'] == 0)){
                        $product = product::view($conn,$_REQUEST['product']);
                        $q[] = $_REQUEST['product'];
                        $q[] = $_COOKIE['InvoiceDate'];
                        $q[] = $product['price'];
                        $q[] = $_REQUEST['qty']; 
                    }else{
                        $q[] = $_REQUEST['product']; 
                        $q[] = $_COOKIE['InvoiceDate'];
                        $q[] = $_REQUEST['price'];
                        $q[] = $_REQUEST['qty'];   
                    }
                    $response = sales::add_details_sold($conn,$q);
                    if($response === false){
                        $url = array(
                            "main"=>"sales",
                            "ui"=>"list",
                            "token"=>$_COOKIE['token'],
                            "er"=>100
                        );
                    }else{
                        $url = array(
                            "main"=>"sales",
                            "ui"=>"details",
                            "id"=>$_SESSION['invoiceID'],
                            "token"=>$_COOKIE['token'],
                            "er"=>200
                        );
                    }
                }elseif($submit[2] ==="delete"){
                    if(false == transaction::delete($conn,$_GET['id'])){
                        $url = array(
                            "main"=>"sales",
                            "ui"=>"details",
                            "id"=>$_SESSION['invoiceID'],
                            "token"=>$_COOKIE['token'],
                            "er"=>100
                        );
                    }else{
                        $url = array(
                            "main"=>"sales",
                            "ui"=>"details",
                            "id"=>$_SESSION['invoiceID'],
                            "token"=>$_COOKIE['token'],
                            "er"=>200
                        );
                    }
                }
            }elseif($action ==="reject"){
                if($submit[2] === "add"){
                    $q[] = $_SESSION['strID'];
                    $q[] = $_SESSION['usrID'];
                    $q[] = 4;
                    $q[] = date("Y-m-d",strtotime($_REQUEST['date']));
                    $q[] = $_REQUEST['ref'];
                    $q[] = $_REQUEST['details'];
                    $response = sales::add_main($conn,$q);
                    if($response == false){
                        $url = array(
                            "main"=>"sales",
                            "ui"=>"reject",
                            "token"=>$_COOKIE['token'],
                            "er"=>100
                        );
                    }else{
                        $url = array(
                            "main"=>"sales",
                            "ui"=>"reject-details",
                            "id"=>$response,
                            "token"=>$_COOKIE['token'],
                            "er"=>200
                        );
                    }
                }elseif($submit[2] === "returnitem"){
                    $q[] = $_SESSION['invoiceID'];
                    $q[] = $_SESSION['strID'];
                    $q[] = $_SESSION['usrID'];
                    $q[] = 4;
                    if((!isset($_REQUEST['price']))||($_REQUEST['price'] == 0)){
                        $product = product::view($conn,$_REQUEST['product']);
                        $q[] = $_REQUEST['product'];
                        $q[] = $_COOKIE['InvoiceDate'];
                        $q[] = $product['price'];
                        $q[] = $_REQUEST['qty']; 
                    }else{
                        $q[] = $_REQUEST['product']; 
                        $q[] = $_COOKIE['InvoiceDate'];
                        $q[] = $_REQUEST['price'];
                        $q[] = $_REQUEST['qty'];   
                    }
                    $response = sales::add_details_reject($conn,$q);
                    if($response === false){
                        $url = array(
                            "main"=>"sales",
                            "ui"=>"reject",
                            "token"=>$_COOKIE['token'],
                            "er"=>100
                        );
                    }else{
                        $url = array(
                            "main"=>"sales",
                            "ui"=>"reject-details",
                            "id"=>$_SESSION['invoiceID'],
                            "token"=>$_COOKIE['token'],
                            "er"=>200
                        );
                    }
                }elseif($submit[2] === "delete"){
                    if(false == transaction::delete($conn,$_GET['id'])){
                        $url = array(
                            "main"=>"sales",
                            "ui"=>"reject",
                            "id"=>$_SESSION['invoiceID'],
                            "token"=>$_COOKIE['token'],
                            "er"=>100
                        );
                    }else{
                        $url = array(
                            "main"=>"sales",
                            "ui"=>"reject-details",
                            "id"=>$_SESSION['invoiceID'],
                            "token"=>$_COOKIE['token'],
                            "er"=>200
                        );
                    }
                }
            }
        break;

        case"purchase";
            if($action ==="main"){
                if($submit[2] === "add"){
                    $q[] = $_SESSION['strID'];
                    $q[] = $_SESSION['usrID'];
                    $q[] = 1;
                    $q[] = date("Y-m-d",strtotime($_REQUEST['date']));
                    $q[] = $_REQUEST['ref'];
                    $q[] = json_encode([
                        "client"=>$_REQUEST['name'],
                        "mobile"=>$_REQUEST['mobile'],
                        "email"=>$_REQUEST['email'],
                        "address"=>$_REQUEST['address']
                    ]);
                    $response = purchase::add_main($conn,$q);
                    if($response == false){
                        $url = array(
                            "main"=>"purchase",
                            "ui"=>"list",
                            "token"=>$_COOKIE['token'],
                            "er"=>100
                        );
                    }else{
                        $url = array(
                            "main"=>"purchase",
                            "ui"=>"details",
                            "id"=>$response,
                            "token"=>$_COOKIE['token'],
                            "er"=>200
                        );
                    }
                }elseif($submit[2] === "delete"){
                    if(false == transaction::DeleteInvoice($conn,$_GET['id'])){
                        $url = array(
                            "main"=>"purchase",
                            "ui"=>"list",
                            "token"=>$_COOKIE['token'],
                            "er"=>100
                        );
                    }else{
                        $url = array(
                            "main"=>"purchase",
                            "ui"=>"list",
                            "token"=>$_COOKIE['token'],
                            "er"=>200
                        );
                    }
                }
            }elseif($action === "details"){
                if($submit[2] === "add"){
                    $q[] = $_SESSION['invoiceID'];
                    $q[] = $_SESSION['strID'];
                    $q[] = $_SESSION['usrID'];
                    $q[] = 1;
                    if((!isset($_REQUEST['price']))||($_REQUEST['price'] == 0)){
                        $product = product::view($conn,$_REQUEST['product']);
                        $q[] = $_REQUEST['product'];
                        $q[] = $_COOKIE['InvoiceDate'];
                        $q[] = $product['purchase_price'];
                        $q[] = $_REQUEST['qty']; 
                    }else{
                        $q[] = $_REQUEST['product']; 
                        $q[] = $_COOKIE['InvoiceDate'];
                        $q[] = $_REQUEST['price'];
                        $q[] = $_REQUEST['qty'];   
                    }
                    $response = purchase::add_details_purchase($conn,$q);
                    if($response === false){
                        $url = array(
                            "main"=>"purchase",
                            "ui"=>"list",
                            "token"=>$_COOKIE['token'],
                            "er"=>100
                        );
                    }else{
                        $url = array(
                            "main"=>"purchase",
                            "ui"=>"details",
                            "id"=>$_SESSION['invoiceID'],
                            "token"=>$_COOKIE['token'],
                            "er"=>200
                        );
                    }
                }elseif($submit[2] ==="delete"){
                    if(false == transaction::delete($conn,$_GET['id'])){
                        $url = array(
                            "main"=>"purchase",
                            "ui"=>"details",
                            "id"=>$_SESSION['invoiceID'],
                            "token"=>$_COOKIE['token'],
                            "er"=>100
                        );
                    }else{
                        $url = array(
                            "main"=>"purchase",
                            "ui"=>"details",
                            "id"=>$_SESSION['invoiceID'],
                            "token"=>$_COOKIE['token'],
                            "er"=>200
                        );
                    }
                }
            }elseif($action ==="reject"){
                if($submit[2] === "add"){
                    $q[] = $_SESSION['strID'];
                    $q[] = $_SESSION['usrID'];
                    $q[] = 2;
                    $q[] = date("Y-m-d",strtotime($_REQUEST['date']));
                    $q[] = $_REQUEST['ref'];
                    $q[] = $_REQUEST['details'];
                    $response = purchase::add_main($conn,$q);
                    if($response == false){
                        $url = array(
                            "main"=>"purchase",
                            "ui"=>"reject",
                            "token"=>$_COOKIE['token'],
                            "er"=>100
                        );
                    }else{
                        $url = array(
                            "main"=>"purchase",
                            "ui"=>"reject-details",
                            "id"=>$response,
                            "token"=>$_COOKIE['token'],
                            "er"=>200
                        );
                    }
                }elseif($submit[2] === "returnitem"){
                    $q[] = $_SESSION['invoiceID'];
                    $q[] = $_SESSION['strID'];
                    $q[] = $_SESSION['usrID'];
                    $q[] = 2;
                    if((!isset($_REQUEST['price']))||($_REQUEST['price'] == 0)){
                        $product = product::view($conn,$_REQUEST['product']);
                        $q[] = $_REQUEST['product'];
                        $q[] = $_COOKIE['InvoiceDate'];
                        $q[] = $product['price'];
                        $q[] = $_REQUEST['qty']; 
                    }else{
                        $q[] = $_REQUEST['product']; 
                        $q[] = $_COOKIE['InvoiceDate'];
                        $q[] = $_REQUEST['price'];
                        $q[] = $_REQUEST['qty'];   
                    }
                    $response = purchase::add_details_reject($conn,$q);
                    if($response === false){
                        $url = array(
                            "main"=>"purchase",
                            "ui"=>"reject",
                            "token"=>$_COOKIE['token'],
                            "er"=>100
                        );
                    }else{
                        $url = array(
                            "main"=>"purchase",
                            "ui"=>"reject-details",
                            "id"=>$_SESSION['invoiceID'],
                            "token"=>$_COOKIE['token'],
                            "er"=>200
                        );
                    }
                }elseif($submit[2] === "delete"){
                    if(false == transaction::delete($conn,$_GET['id'])){
                        $url = array(
                            "main"=>"purchase",
                            "ui"=>"reject",
                            "id"=>$_SESSION['invoiceID'],
                            "token"=>$_COOKIE['token'],
                            "er"=>100
                        );
                    }else{
                        $url = array(
                            "main"=>"purchase",
                            "ui"=>"reject-details",
                            "id"=>$_SESSION['invoiceID'],
                            "token"=>$_COOKIE['token'],
                            "er"=>200
                        );
                    }
                }
            }
        break;

        case"transaction";
            if($action ==="delete"){
                if(false == transaction::DeleteInvoice($conn,$_GET['id'])){
                    $url = array(
                        "main"=>"sales",
                        "ui"=>$_SESSION['ui'],
                        "token"=>$_COOKIE['token'],
                        "er"=>100
                    );
                }else{
                    $url = array(
                        "main"=>"sales",
                        "ui"=>$_SESSION['ui'],
                        "token"=>$_COOKIE['token'],
                        "er"=>200
                    );
                }
            }elseif($action ==="update"){

            }elseif($action ==="delete"){

            }
        break;

        case"transfer";
            if($action ==="main"){
                if($submit[2] === "add"){
                    $frm = transfer::get_store($conn,$_SESSION['strID']);
                    $to = transfer::get_store($conn,$_REQUEST['store']);
                    if(($frm == false)||($to == false)){
                        $url = array(
                            'main'=>'transfer',
                            'ui'=>'list',
                            'token'=>$_COOKIE['token'],
                            'er'=>100
                        );
                    }else{
                        if($_REQUEST['type'] === "issus-in"){
                            $invoice[] = $_SESSION['strID'];
                            $invoice[] = $_SESSION['usrID'];
                            $invoice[] = $type_id = 5;
                            $invoice[] = date("Y-m-d",strtotime($_REQUEST['date']));
                            $invoice[] = $_REQUEST['ref'];
                            $invoice[] = json_encode([
                                "status"=>"send-stock",
                                "to"=>$to['store_name'],
                                "frm"=>$frm['store_name']
                            ]);
                            $invoice_id = transfer::add_main($conn,$invoice);
                        }else{
                            $invoice[] = $_SESSION['strID'];
                            $invoice[] = $_SESSION['usrID'];
                            $invoice[] = $type_id = 6;
                            $invoice[] = date("Y-m-d",strtotime($_REQUEST['date']));
                            $invoice[] = $_REQUEST['ref'];
                            $invoice[] = json_encode([
                                "status"=>"receive-stock",
                                "to"=>$to['store_name'],
                                "frm"=>$frm['store_name']
                            ]);
                            $invoice_id = transfer::add_main($conn,$invoice);
                        }
                        if($invoice_id == false){
                            $url = array(
                                'main' =>"dasshbaord",
                                'token'=>$_COOKIE['token'],
                                'eer'=>100 
                            );
                        }else{

                            $q[] = date("Y-m-d",strtotime($_REQUEST['date']));
                            $q[] = $frm['store_id'];
                            $q[] = $to['store_id'];
                            $q[] = $frm['store_name'];
                            $q[] = $to['store_name'];
                            $q[] = $invoice_id;
                            $q[] = $type_id;
                            $q[] = $_SESSION['usrID'];
                            $response = transfer::add($conn,$q);
                            if($response == false){ 
                                $url = array(
                                    'main'=>"transfer",
                                    'ui'=>"list",
                                    'token'=>$_COOKIE['token']
                                );
                            }else{
                                $url = array(
                                    'main'=>"transfer",
                                    'ui'=>"details",
                                    'id'=>$invoice_id,
                                    'type'=>$type_id,
                                    'token'=>$_COOKIE['token']
                                );
                            }
                        }
                    
                    }   
                }elseif($submit[2] ==="delete"){
                    if(false == transfer::delete($conn,$_REQUEST['id'])){
                        $url = array(
                            'main'=>'transfer',
                            'ui'=>'list',
                            'token'=>$_COOKIE['token'],
                            'er'=>100
                        );
                    }else{
                        $url = array(
                            'main'=>'transfer',
                            'ui'=>'list',
                            'token'=>$_COOKIE['token'],
                            'er'=>200
                        );
                    }
                }
            }elseif($action ==="details"){
                if($submit[2] ==="add"){
                    $q[] = $_SESSION['invoiceID'];
                    $q[] = $_SESSION['strID'];
                    $q[] = $_SESSION['usrID'];
                    $q[] = $_COOKIE['type_id'];
                    if((!isset($_REQUEST['price']))||($_REQUEST['price'] == 0)){
                        $product = product::view($conn,$_REQUEST['product']);
                        $q[] = $_REQUEST['product'];
                        $q[] = $_COOKIE['InvoiceDate'];
                        $q[] = $product['purchase_price'];
                        $q[] = $_REQUEST['qty']; 
                    }else{
                        $q[] = $_REQUEST['product']; 
                        $q[] = $_COOKIE['InvoiceDate'];
                        $q[] = $_REQUEST['price'];
                        $q[] = $_REQUEST['qty'];   
                    }
                    if($_COOKIE['type_id'] == 5){
                        $response = transfer::add_issus_in($conn,$q);
                    }elseif($_COOKIE['type_id'] == 6){
                        $response = transfer::add_issus_out($conn,$q);
                    }
                    if($response === false){
                        $url = array(
                            "main"=>"transfer",
                            "ui"=>"list",
                            "token"=>$_COOKIE['token'],
                            "er"=>100
                        );
                    }else{
                        $url = array(
                            "main"=>"transfer",
                            "ui"=>"details",
                            "id"=>$_SESSION['invoiceID'],
                            'type'=>$_COOKIE['type_id'],
                            "token"=>$_COOKIE['token'],
                            "er"=>200
                        );
                    }

                }elseif($submit[2] === "delete"){
                    if(false == transfer::delete_details($conn,$_REQUEST['id'])){
                        $url = array(
                            "main"=>"transfer",
                            "ui"=>"details",
                            "id"=>$_SESSION['invoiceID'],
                            'type'=>$_COOKIE['type_id'],
                            "token"=>$_COOKIE['token'],
                            "er"=>100
                        );
                    }else{
                        $url = array(
                            "main"=>"transfer",
                            "ui"=>"details",
                            "id"=>$_SESSION['invoiceID'],
                            'type'=>$_COOKIE['type_id'],
                            "token"=>$_COOKIE['token'],
                            "er"=>200
                        );
                    }
                }
            }
        break;
    }

    header("location: ?".http_build_query($url));
    $conn=null;
}
?>