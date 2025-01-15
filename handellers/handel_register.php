<?php
if(session_status()==PHP_SESSION_NONE)session_start();
include '../core/functions_and_validations.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $user_name = htmlspecialchars(htmlentities(trim($_POST['username']))) ;
      $user_email = htmlspecialchars(htmlentities(trim($_POST['useremail']))) ;
      $user_password = htmlspecialchars(htmlentities(trim($_POST['userpassword']))) ;
      $user_password = password_hash($user_password, PASSWORD_DEFAULT);
      $admin_name = 'user admin';
      $user = 'regular user ';
       $_POST['role']=
       ['admin' => $admin_name , 
       'user' => $user];

       /* var_dump($_POST);
       var_dump($_POST['role']);
       var_dump($_POST['username']);
       var_dump($_POST['useremail']);
       var_dump($_POST['userpassword']); */


         $errors = [];
#validation of user name 
if(!isset($_POST['username']) || empty($user_name)){
     $errors[] ='name is required' ;
}elseif( strlen($user_name) < 6){
    $errors[] ='sorry user name must be greater than 6 char';
}elseif( strlen($user_name) > 15){
   $errors[] ='sorry user name must be less than 15 char';
}


# validation of email 

if(!isset($_POST['useremail']) || empty($user_email)){
    $errors[]= 'sorry email is required';
}elseif(!filter_var($user_email , FILTER_VALIDATE_EMAIL)){
    $errors[]= 'sorry email is not valid';
}

# validation of password 

if(!isset($_POST['userpassword']) || empty($user_password)){
    $errors[] = 'sorry password is required';
}elseif( strlen($user_password) < 8){
    $errors[] = 'sorry password must be greater than 8 char';
}elseif( strlen($user_password) > 10){
    $errors[] = 'sorry password must be less than 10 char';
}

#  validation of role
if(!isset($_POST['role']) || empty($_POST['role'])){
    $errors[] = 'sorry role is required';
}

#  check if there is no errors

if(empty($errors)){

    $user_data = [
        'user_name' => $user_name ,
        'user_email' => $user_email ,
        'user_password' => $user_password ,
        'role' => $_POST['role']
    ];

    $file = fopen('../Data/userdata.csv','a');
   $file = fwrite($file , $user_data['user_name'].','.$user_data['user_email'].','.$user_data['user_password'].','.$user_data['role']);
    fclose($file); 
   $_SESSION['auth'] =  $user_data = [
                                    'user_name' => $user_name ,
                                    'user_email' => $user_email ,
                                    'user_password' => $user_password ,
                                    'role' => $_POST['role']
                                         ];
}else{
    $_SESSION['errors'] = $errors;
}




}else{
   
    $errors[]= 'please enter valid data';
    header("location:../NavItem/register.php") ;
}
?>