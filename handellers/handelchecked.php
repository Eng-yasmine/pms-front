<?php
if (session_status() == PHP_SESSION_NONE) session_start();
include '../core/checked_and_contact.php';
include   '../core/checkedvalidtion.php';



$errors = [] ;
//echo "done" ;

if (checkmethod('POST')){
    $name = sanitizing($_POST['name']);
    $email = sanitizing($_POST['email']);
    $adress = sanitizing($_POST['address']);
    $phone = sanitizing($_POST['phone']);
    $note = sanitizing($_POST['note']);

    #validate name
    
    if (empty($name)) {
        $errors[] = 'sorry..! name is required ';
    }
    if (check_mini_length($name, 15)) {

        $errors[] = 'sorry..! name must be greater than 15 char';
    }
    if (check_max_length($name, 25)) {

        $errors[] = 'sorry..! name must be greater than 15 char';
    }
#validate email

    if (empty($email)) {

        $errors[] = 'sorry..! email is required';
    }
    if (!check_email($email)) {

        $errors[] = 'sorry..! its not valid email';
    }
#validate address

    if(!check_any_textarea($adress)){

    $errors[] = 'sorry..! your address must be words';
    }
    if(check_mini_length($adress , 20)){

    $errors[] = 'sorry..!your address must be greater than 20 char';
    }
    if(check_max_length($adress , 100)){

    $errors[] = 'sorry..!your address must be less than 100 char';
    }
    if(!check_phone($phone)){

    $errors[] = 'sorry..! your number must be valid';
    }
    if(empty($note)){

      $errors[] = 'sorry.!this field is requiredv';
    }
    if(!check_any_textarea($note)){

        $errors[] = 'sorry..! your address must be words';
        }
        if(check_mini_length($note , 50)){
    
        $errors[] = 'sorry..!your address must be greater than 50 char';
        }
        if(check_max_length($note , 100)){
    
        $errors[] = 'sorry..!your address must be less than 100 char';
        }
        
        if(empty($errors)){

        $_SESSION['user_info'] =[$name , $email , $phone , $adress , $note ];

        header("location:location:../NavItem/index.php");
        die();
           }else{

        $_SESSION['errors'] =$errors ;

        header("location:../NavItem/checkout.php");
        die();
     
           }
}else{

  $_SESSION['request_error'] = 'its not supported method ' ;
  header("location:../NavItem/checkout.php");
  die();
}

?>