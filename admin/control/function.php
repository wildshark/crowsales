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

            $output .="<tr>
            <td>$n</td>
            <td>$sku</td>
            <td>$name</td>
            <td>$brand</td>
            <td>$catagory</td>
            <td>$price</td>
            <td class='$css'>$status</td>
            <td>
                <a class='me-3' href='editstore.html'>
                    <img src='assets/img/icons/edit.svg' alt='img'>
                </a>
                <a class='me-3 confirm-text' href='javascript:void(0);'>
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
            $total_product = catagory::count_product_group($conn,$id);
            $output .="<tr>
            <td>$n</td>
            <td>$name</td>
            <td>$total_product</td>
            <td class='$css'>$status</td>
            <td>
                <a class='me-3' href='editstore.html'>
                    <img src='assets/img/icons/edit.svg' alt='img'>
                </a>
                <a class='me-3 confirm-text' href='javascript:void(0);'>
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
                <a class='me-3' href='editstore.html'>
                    <img src='assets/img/icons/edit.svg' alt='img'>
                </a>
                <a class='me-3 confirm-text' href='javascript:void(0);'>
                    <img src='assets/img/icons/delete.svg' alt='img'>
                </a>
            </td>
        </tr>";
        }
    }
    return $output;
}

function SalesList($data){
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

function SalesRejectList($data){
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
            $qty = $r['return'];
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

function PurchaseList($data){
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
            $qty = $r['purchase'];
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

function PurchaseRejectList($data){
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
            $qty = $r['purchase'];
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
?>