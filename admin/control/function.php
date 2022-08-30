<?php

function GenToken($user,$store){
    if(!isset($user)){
        $user = 0;
    }

    if(!isset($user)){
        $store = 0;
    }
    return md5($user.$store);
}

function CatagoryCombo($conn){
    $output ="";
    $data = catagory::fetch($conn);
    if($data == false){
        $output ="";
    }else{
        foreach($data as $r){
            $id = $r['catagory_id'];
            $catagory = $r['catagory'];
            $output .="<option value='$id'>$catagory</option>";
        }
    }
    return $output;
}

function ProductCombe($conn){
    $output ="";
    $data = product::available($conn);
    if($data == false){
        $output ="";
    }else{
        foreach($data as $r){
            $id = $r['product_id'];
            $sku = $r['product_sku'];
            $name = $r['product_name'];
            $output .="<option value='$id'>$sku - $name</option>";
        }
    }
    return $output;
}

function BrandCombo($conn){
    $output ="";
    $data = brand::fetch($conn);
    if($data == false){
        $output ="";
    }else{
        foreach($data as $r){
            $id = $r['brand_id'];
            $brand = $r['brand'];
            $output .="<option value='$id'>$brand</option>";
        }
    }
    return $output;
}

function StoreCombo($conn){
    $output ="";
    $data = store::fetch($conn);
    if($data == false){
        $output ="";
    }else{
        foreach($data as $r){
            $id = $r['store_id'];
            $name = $r['store_name'];
            $output .="<option value='$id'>$name</option>";
        }
    }
    return $output;
}

function msgBox($err){

    if(!isset($err)){
        return "";
    }else{
        switch($err){

            case 200;

            break;

            default:
                
        }
    }
    $output = "<div class='alert alert-secondary alert-dismissible fade show' role='alert'>
    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";

    return $output;
}

function UserList($data){
    $output="";
    if((!isset($data))||($data == false)){
        $output="";
    }else{
        foreach ($data as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }
            $id = $r['user_id'];
            $name = $r['fname'];
            $usrn = $r['username'];
            $email = $r['email'];
            $mobile = $r['mobile'];
            $token = $_GET['token'];
            if($r['status'] == "Enable"){
                $css ="text-success";
            }else{
                $css ="text-danger";
            }
            $status = $r['status'];

            $output .="<tr>
            <td>$n</td>
            <td>$usrn</td>
            <td>$name</td>
            <td>$mobile</td>
            <td>$email</td>
            <td class='$css'>$status</td>
            <td>
                <a class='me-3' href='?main=user&ui=edit&id=$id&token=$token'>
                    <img src='assets/img/icons/edit.svg' alt='img'>
                </a>
                <a class='me-3' href='?submit=user-delete&id=$id'>
                    <img src='assets/img/icons/delete.svg' alt='img'>
                </a>
            </td>
        </tr>";
        }
    }
    return $output;
}

function StoreList($data){
    $output="";
    if((!isset($data))||($data == false)){
        $output="";
    }else{
        foreach ($data as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }
            $id = $r['store_id'];
            $store = $r['store_name'];
            $address = $r['store_address'];
            $mobile = $r['mobile'];
            $token = $_GET['token'];
            if($r['status'] == "Enable"){
                $css ="text-success";
            }else{
                $css ="text-danger";
            }
            $status = $r['status'];

            $output .="<tr>
            <td>$n</td>
            <td>$store</td>
            <td>$mobile</td>
            <td>$address</td>
            <td class='$css'>$status</td>
            <td>
                <a class='me-3' href='?main=store&ui=edit&id=$id&token=$token'>
                    <img src='assets/img/icons/edit.svg' alt='img'>
                </a>
                <a class='me-3' href='?submit=store-delete&id=$id'>
                    <img src='assets/img/icons/delete.svg' alt='img'>
                </a>
            </td>
        </tr>";
        }
    }
    return $output;
}

function ProductList($data){
    $output="";
    if((!isset($data))||($data == false)){
        $output="";
    }else{
        foreach ($data as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }
            $id = $r['product_id'];
            $name = $r['product_name'];
            $sku = $r['product_sku'];
            $price = $r['price'];
            $brand = $r['brand'];
            $catagory = $r['catagory'];
            if($r['status'] == "Enable"){
                $css ="text-success";
            }else{
                $css ="text-danger";
            }
            $status = $r['status'];
            $token = $_GET['token'];
            $output .="<tr>
            <td>$n</td>
            <td>$sku</td>
            <td>$name</td>
            <td>$brand</td>
            <td>$catagory</td>
            <td>$price</td>
            <td class='$css'>$status</td>
            <td>
                <a class='me-3' href='?main=product&ui=edit&id=$id&token=$token'>
                    <img src='assets/img/icons/edit.svg' alt='img'>
                </a>
                <a class='me-3' href='?submit=product-delete&id=$id'>
                    <img src='assets/img/icons/delete.svg' alt='img'>
                </a>
            </td>
        </tr>";
        }
    }
    return $output;
}

function CatagoryList($data){
    $output="";
    if((!isset($data))||($data == false)){
        $output="";
    }else{
        foreach ($data as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }
            $id = $r['catagory_id'];
            $name = $r['catagory'];
            if($r['status'] == "Enable"){
                $css ="text-success";
            }else{
                $css ="text-danger";
            }
            $status = $r['status'];
            $token = $_GET['token'];
            $output .="<tr>
            <td>$n</td>
            <td>$name</td>
            <td>0</td>
            <td class='$css'>$status</td>
            <td>
                <a class='me-3' href='?main=catagory&ui=edit&id=$id&token=$token'>
                    <img src='assets/img/icons/edit.svg' alt='img'>
                </a>
                <a class='me-3' href='?submit=catagory-delete&id=$id'>
                    <img src='assets/img/icons/delete.svg' alt='img'>
                </a>
            </td>
        </tr>";
        }
    }
    return $output;
}

function BrandList($data){
    $output="";
    if((!isset($data))||($data == false)){
        $output="";
    }else{
        foreach ($data as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }
            $id = $r['brand_id'];
            $name = $r['brand'];
            $image = $r['image'];
            $token = $_GET['token'];
            if($r['status'] == "Enable"){
                $css ="text-success";
            }else{
                $css ="text-danger";
            }
            $status = $r['status'];

            $output .="<tr>
            <td>$n</td>
            <td>$image</td>
            <td>$name</td>
            <td class='$css'>$status</td>
            <td>
                <a class='me-3' href='?main=brand&ui=edit&id=$id&token=$token'>
                    <img src='assets/img/icons/edit.svg' alt='img'>
                </a>
                <a class='me-3' href='?submit=brand-delete&id=$id'>
                    <img src='assets/img/icons/delete.svg' alt='img'>
                </a>
            </td>
        </tr>";
        }
    }
    return $output;
}

function SalesBook($conn){
    $data = sales::sales_book($conn);
    $output="";
    if((!isset($data))||($data == false)){
        $output="";
    }else{
        foreach ($data as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }

            $id = $r['tran_id'];
            $date = $r['tran_date'];
            $sku = $r['product_sku'];
            $name = $r['product_name'];
            $ref = $r['ref'];
            $price = $r['price'];
            $qty = $r['sold'];
            $store = $r['store_name'];
            $usrn =  $r['fname'];
            $amt = number_format($price * $qty,2);
            
            $output .="<tr>
            <td>$n</td>
            <td>$date</td>
            <td>$sku</td>
            <td>$name</td>
            <td>$ref</td>
            <td>$price</td>
            <td>$qty</td> 
            <td>$amt</td>
            <td>$store</td>
            <td>$usrn</td>
        </tr>";
        }
    }
    return $output;
}

function PurchaseBook($conn){
    $data = purchase::purchase_book($conn);
    $output="";
    if((!isset($data))||($data == false)){
        $output="";
    }else{
        foreach ($data as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }

            $id = $r['tran_id'];
            $date = $r['tran_date'];
            $sku = $r['product_sku'];
            $name = $r['product_name'];
            $ref = $r['ref'];
            $price = $r['price'];
            $qty = $r['sold'];
            $store = $r['store_name'];
            $usrn =  $r['fname'];
            $amt = number_format($price * $qty,2);
            
            $output .="<tr>
            <td>$n</td>
            <td>$date</td>
            <td>$sku</td>
            <td>$name</td>
            <td>$ref</td>
            <td>$price</td>
            <td>$qty</td> 
            <td>$amt</td>
            <td>$store</td>
            <td>$usrn</td>
        </tr>";
        }
    }
    return $output;
}

function PurchaseRejectBook($conn){
    $data = purchase::reject_book($conn);
    $output="";
    if((!isset($data))||($data == false)){
        $output="";
    }else{
        foreach ($data as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }

            $id = $r['tran_id'];
            $date = $r['tran_date'];
            $sku = $r['product_sku'];
            $name = $r['product_name'];
            $ref = $r['ref'];
            $price = $r['price'];
            $qty = $r['reject'];
            $store = $r['store_name'];
            $usrn =  $r['fname'];
            $amt = number_format($price * $qty,2);
            
            $output .="<tr>
            <td>$n</td>
            <td>$date</td>
            <td>$sku</td>
            <td>$name</td>
            <td>$ref</td>
            <td>$price</td>
            <td>$qty</td> 
            <td>$amt</td>
            <td>$store</td>
            <td>$usrn</td>
        </tr>";
        }
    }
    return $output;
}

function SalesInvoices($conn){
    $data = sales::fetch_inovices($conn);
    $output="";
    if((!isset($data))||($data == false)){
        $output="";
    }else{
        foreach ($data as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }

            $id = $r['invoice_id'];
            $date = $r['invo_date'];
            $ref = $r['ref'];
            $qty = $r['qty'];
            $subtotal = $r['subtotal'];
            $discount = $r['discount'];
            $tax = $r['tax'];
            $amt = number_format($r['amount'],2);
            $paid = 0;
            $store =  $r['store_name'];
            $usrn =  $r['fname'];
            $token = $_GET['token'];
            
            $output .="<tr>
            <td>$n</td>
            <td>$date</td>
            <td>$ref</td>
            <td>$qty</td> 
            <td>$amt</td>
            <td>$paid</td>
            <td>$store</td>
            <td>$usrn</td>
            <td>
                <a class='me-3' href='?main=sales&ui=details&id=$id&token=$token'>
                    <img src='assets/img/icons/edit.svg' alt='img'>
                </a>
                <a class='me-3' href='?submit=sales-main-delete&id=$id'>
                    <img src='assets/img/icons/delete.svg' alt='img'>
                </a>
            </td>
        </tr>";
        }
    }
    return $output;
}

function PurchaseInvoices($conn){
    $data = purchase::fetch_inovices($conn);
    $output="";
    if((!isset($data))||($data == false)){
        $output="";
    }else{
        foreach ($data as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }

            $id = $r['invoice_id'];
            $date = $r['invo_date'];
            $ref = $r['ref'];
            $qty = $r['qty'];
            $subtotal = $r['subtotal'];
            $discount = $r['discount'];
            $tax = $r['tax'];
            $amt = number_format($r['amount'],2);
            $paid = 0;
            $store =  $r['store_name'];
            $usrn =  $r['fname'];
            $token = $_GET['token'];
            
            $output .="<tr>
            <td>$n</td>
            <td>$date</td>
            <td>$ref</td>
            <td>$qty</td> 
            <td>$amt</td>
            <td>$paid</td>
            <td>$store</td>
            <td>$usrn</td>
            <td>
                <a class='me-3' href='?main=purchase&ui=details&id=$id&token=$token'>
                    <img src='assets/img/icons/edit.svg' alt='img'>
                </a>
                <a class='me-3' href='?submit=purchase-main-delete&id=$id'>
                    <img src='assets/img/icons/delete.svg' alt='img'>
                </a>
            </td>
        </tr>";
        }
    }
    return $output;
}

function SalesRejectInvoices($conn){
    $data = sales::fetch_reject_inovices($conn);
    $output="";
    if((!isset($data))||($data == false)){
        $output="";
    }else{
        foreach ($data as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }

            $id = $r['invoice_id'];
            $date = $r['invo_date'];
            $ref = $r['ref'];
            $qty = $r['qty'];
            $subtotal = $r['subtotal'];
            $discount = $r['discount'];
            $tax = $r['tax'];
            $amt = number_format($r['amount'],2);
            $paid = 0;
            $store =  $r['store_name'];
            $usrn =  $r['fname'];
            $token = $_GET['token'];
            
            $output .="<tr>
            <td>$n</td>
            <td>$date</td>
            <td>$ref</td>
            <td>$qty</td> 
            <td>$amt</td>
            <td>$paid</td>
            <td>$store</td>
            <td>$usrn</td>
            <td>
                <a class='me-3' href='?main=sales&ui=reject-details&id=$id&token=$token'>
                    <img src='assets/img/icons/edit.svg' alt='img'>
                </a>
                <a class='me-3' href='?submit=transaction-delete&id=$id'>
                    <img src='assets/img/icons/delete.svg' alt='img'>
                </a>
            </td>
        </tr>";
        }
    }
    return $output;
}

function PurchaseRejectInvoices($conn){
    $data = purchase::fetch_reject_inovices($conn);
    $output="";
    if((!isset($data))||($data == false)){
        $output="";
    }else{
        foreach ($data as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }

            $id = $r['invoice_id'];
            $date = $r['invo_date'];
            $ref = $r['ref'];
            $qty = $r['qty'];
            $subtotal = $r['subtotal'];
            $discount = $r['discount'];
            $tax = $r['tax'];
            $amt = number_format($r['amount'],2);
            $paid = 0;
            $store =  $r['store_name'];
            $usrn =  $r['fname'];
            $token = $_GET['token'];
            
            $output .="<tr>
            <td>$n</td>
            <td>$date</td>
            <td>$ref</td>
            <td>$qty</td> 
            <td>$amt</td>
            <td>$paid</td>
            <td>$store</td>
            <td>$usrn</td>
            <td>
                <a class='me-3' href='?main=sales&ui=reject-details&id=$id&token=$token'>
                    <img src='assets/img/icons/edit.svg' alt='img'>
                </a>
                <a class='me-3' href='?submit=transaction-delete&id=$id'>
                    <img src='assets/img/icons/delete.svg' alt='img'>
                </a>
            </td>
        </tr>";
        }
    }
    return $output;
}

function InvoiceSalesData($conn){
    $data = sales::list_details_sold($conn,$_GET['id']);
    $output="";
    if((!isset($data))||($data == false)){
        $output="";
    }else{
        foreach ($data as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }

            $id = $r['tran_id'];
            $sku = $r['product_sku'];
            $product = $r['product_name'];
            $price = number_format($r['price'],2);
            $qty = $r['sold'];
            $discount = 0;
            $tax = 0;
            $amount = number_format($r['amt'],2);
            
            
            $output .="<tr>
            <td>$n</td>
            <td class='productimgname'>
                <a class='product-img'>
                    <img src='assets/img/product/product8.jpg' alt='product'>
                </a>
                <a href='javascript:void(0);'>$sku - $product</a>
            </td>
            <td>$qty</td>
            <td>$price</td>
            <td>$discount</td>
            <td>$tax</td>
            <td>$amount</td>
            <td>
                <a href='?submit=sales-details-delete&id=$id' class='delete-set'><img src='assets/img/icons/delete.svg'alt='svg'></a>
            </td>
        </tr>";
        }
    }
    return $output;
}

function InvoicePurchaseData($conn){ 
    $data = purchase::list_details_purchase($conn,$_GET['id']);
    $output="";
    if((!isset($data))||($data == false)){
        $output="";
    }else{
        foreach ($data as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }

            $id = $r['tran_id'];
            $sku = $r['product_sku'];
            $product = $r['product_name'];
            $price = number_format($r['price'],2);
            $qty = $r['purchase'];
            $discount = 0;
            $tax = 0;
            $amount = number_format($r['amt'],2);
            
            
            $output .="<tr>
            <td>$n</td>
            <td class='productimgname'>
                <a class='product-img'>
                    <img src='assets/img/product/product8.jpg' alt='product'>
                </a>
                <a href='javascript:void(0);'>$sku - $product</a>
            </td>
            <td>$qty</td>
            <td>$price</td>
            <td>$discount</td>
            <td>$tax</td>
            <td>$amount</td>
            <td>
                <a href='?submit=purchase-details-delete&id=$id' class='delete-set'><img src='assets/img/icons/delete.svg'alt='svg'></a>
            </td>
        </tr>";
        }
    }
    return $output;
}

function InvoiceSaleRejectData($conn){
    $data = sales::list_details_reject($conn,$_GET['id']);
    $output="";
    if((!isset($data))||($data == false)){
        $output="";
    }else{
        foreach ($data as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }

            $id = $r['tran_id'];
            $sku = $r['product_sku'];
            $product = $r['product_name'];
            $price = number_format($r['price'],2);
            $qty = $r['return'];
            $discount = 0;
            $tax = 0;
            $amount = number_format($r['amt'],2);
            
            
            $output .="<tr>
            <td>$n</td>
            <td class='productimgname'>
                <a class='product-img'>
                    <img src='assets/img/product/product8.jpg' alt='product'>
                </a>
                <a href='javascript:void(0);'>$sku - $product</a>
            </td>
            <td>$qty</td>
            <td>$price</td>
            <td>$discount</td>
            <td>$tax</td>
            <td>$amount</td>
            <td>
                <a href='?submit=sales-reject-delete&id=$id' class='delete-set'><img src='assets/img/icons/delete.svg'alt='svg'></a>
            </td>
        </tr>";
        }
    }
    return $output;
}

function InvoicePurchaseRejectData($conn){ 
    $data = purchase::list_details_reject($conn,$_GET['id']);
    $output="";
    if((!isset($data))||($data == false)){
        $output="";
    }else{
        foreach ($data as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }

            $id = $r['tran_id'];
            $sku = $r['product_sku'];
            $product = $r['product_name'];
            $price = number_format($r['price'],2);
            $qty = $r['return'];
            $discount = 0;
            $tax = 0;
            $amount = number_format($r['amt'],2);
            
            
            $output .="<tr>
            <td>$n</td>
            <td class='productimgname'>
                <a class='product-img'>
                    <img src='assets/img/product/product8.jpg' alt='product'>
                </a>
                <a href='javascript:void(0);'>$sku - $product</a>
            </td>
            <td>$qty</td>
            <td>$price</td>
            <td>$discount</td>
            <td>$tax</td>
            <td>$amount</td>
            <td>
                <a href='?submit=sales-reject-delete&id=$id' class='delete-set'><img src='assets/img/icons/delete.svg'alt='svg'></a>
            </td>
        </tr>";
        }
    }
    return $output;
}

function StoreInventoryData($conn){ 
    $data = inventory::store_stock_details($conn,$_GET['id']);
    $output="";
    if((!isset($data))||($data == false)){
        $output="";
    }else{
        foreach ($data as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }

            $sku = $r['product_sku'];
            $product = $r['product_name'];
            $purchase = $r['purchase'];
            $reject = $r['purchase_reject'];
            $issus_in = $r['issuse_in'];
            $issus_out = $r['issuse_out'];
            $sold = $r['sold'];
            $return = $r['sales_reject'];

            $bal_purchase = $purchase - $reject;
            $bal_stock = (($bal_purchase + $issus_in) - $issus_out);
            $bal = (($bal_stock - $sold) + $return);
            $output .="<tr>
            <td>$n</td>
            <td class='productimgname'>
                <a class='product-img'>
                    <img src='assets/img/product/product8.jpg' alt='product'>
                </a>
                <a href='javascript:void(0);'>$sku - $product</a>
            </td>
            <td>$purchase</td>
            <td>$reject</td>
            <td>$issus_in</td>
            <td>$issus_out</td>
            <td>$sold</td>
            <td>$return</td>
            <td>$bal</td>
            </tr>";
        }
    }
    return $output;
}

function StoreInventoryMenu($conn){
    $data = inventory::store_stock_main($conn);
    $output="";
    if((!isset($data))||($data == false)){
        $output="";
    }else{
        foreach ($data as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }
            $id = $r['store_id'];
            $store = $r['store_name'];
            $bal = $r['bal'];
            $token = $_GET['token'];
            
            $output .="<tr>
            <td>$n</td>
            <td>$store</td>
            <td>$bal</td>
            <td>
                <a class='me-3' href='?main=inventory&frm=store&ui=store-details&store=$store&bal=$bal&id=$id&token=$token'>
                    <img src='assets/img/icons/edit.svg' alt='img'>
                </a>
            </td>
        </tr>";
        }
    }
    return $output;
}

function GenStockInventoryData($conn){ 
    $data = inventory::general_stock($conn);
    $output="";
    if((!isset($data))||($data == false)){
        $output="";
    }else{
        foreach ($data as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }

            $sku = $r['product_sku'];
            $product = $r['product_name'];
            $catagory = $r['catagory'];
            $brand = $r['brand'];
            $bal = $r['bal'];
            
            $output .="<tr>
            <td>$n</td>
            <td>$sku</td>
            <td>$product</td>
            <td>$brand</td>
            <td>$catagory</td>
            <td>$bal</td>
            </tr>";
        }
    }
    return $output;
}

function InvoiceIssusInData($conn){
    $data = transfer::list_details_issuse_in($conn,$_GET['id']);
    $output="";
    if((!isset($data))||($data == false)){
        $output="";
    }else{
        foreach ($data as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }

            $id = $r['tran_id'];
            $sku = $r['product_sku'];
            $product = $r['product_name'];
            $price = number_format($r['price'],2);
            $qty = $r['issuse_in'];
            $discount = 0;
            $tax = 0;
            $amount = number_format($r['amt'],2);
            
            
            $output .="<tr>
            <td>$n</td>
            <td class='productimgname'>
                <a class='product-img'>
                    <img src='assets/img/product/product8.jpg' alt='product'>
                </a>
                <a href='javascript:void(0);'>$sku - $product</a>
            </td>
            <td>$qty</td>
            <td>$price</td>
            <td>$discount</td>
            <td>$tax</td>
            <td>$amount</td>
            <td>
                <a href='?submit=transfer-details-delete&id=$id' class='delete-set'><img src='assets/img/icons/delete.svg'alt='svg'></a>
            </td>
        </tr>";
        }
    }
    return $output; 
}

function InvoiceIssusOutData($conn){
    $data = transfer::list_details_issuse_out($conn,$_GET['id']);
    $output="";
    if((!isset($data))||($data == false)){
        $output="";
    }else{
        foreach ($data as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }

            $id = $r['tran_id'];
            $sku = $r['product_sku'];
            $product = $r['product_name'];
            $price = number_format($r['price'],2);
            $qty = $r['issuse_out'];
            $discount = 0;
            $tax = 0;
            $amount = number_format($r['amt'],2);
            
            
            $output .="<tr>
            <td>$n</td>
            <td class='productimgname'>
                <a class='product-img'>
                    <img src='assets/img/product/product8.jpg' alt='product'>
                </a>
                <a href='javascript:void(0);'>$sku - $product</a>
            </td>
            <td>$qty</td>
            <td>$price</td>
            <td>$discount</td>
            <td>$tax</td>
            <td>$amount</td>
            <td>
                <a href='?submit=transfer-details-delete&id=$id' class='delete-set'><img src='assets/img/icons/delete.svg'alt='svg'></a>
            </td>
        </tr>";
        }
    }
    return $output;
}

function IssueInvoiceDataMain($conn){
    $data = transfer::fetch_main($conn);
    $output="";
    if((!isset($data))||($data == false)){
        $output="";
    }else{
        foreach ($data as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }

            $id = $r['invoice_id'];
            $date = $r['issus_date'];
            $ref = $r['ref'];
            $qty = $r['qty'];
            $frm = $r['from_store_name'];
            $to = $r['to_store_name'];
            $amt = number_format($r['amount'],2);
            $usrn =  $r['fname'];
            $token = $_GET['token'];
            $type = $r['type_id'];
            $output .="<tr>
            <td>$n</td>
            <td>$date</td>
            <td>$ref</td>
            <td>$frm</td>
            <td>$to</td>
            <td>$qty</td> 
            <td>$amt</td>
            <td>$usrn</td>
            <td>
                <a class='me-3' href='?main=transfer&ui=details&id=$id&type=$type&token=$token'>
                    <img src='assets/img/icons/edit.svg' alt='img'>
                </a>
                <a class='me-3' href='?submit=transfer-main-delete&id=$id'>
                    <img src='assets/img/icons/delete.svg' alt='img'>
                </a>
            </td>
        </tr>";
        }
    }
    return $output;
}

?>