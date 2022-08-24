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
            $name = $r['fname'];
            $usrn = $r['username'];
            $email = $r['emaill'];
            $mobile = $r['mobile'];

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
            $name = $r['fname'];
            $usrn = $r['username'];
            $email = $r['emaill'];
            $mobile = $r['mobile'];

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
?>