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
        return ="";
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

?>