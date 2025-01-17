<?php
if (session_status() === PHP_SESSION_NONE)session_start();
include '../core/functions_and_validations.php' ;



$errors = [] ;
//echo "done" ;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
$name = trim($_POST['name']);
$name= htmlspecialchars(htmlentities($name));
$email = trim($_POST['email']);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
$email = htmlspecialchars($email);
$message = trim($_POST['message']);
$message = htmlspecialchars(htmlentities($message));

foreach ($_POST as $key => $value){
    $$key = sanitizeInput($value);
}


$errors = [];

if (!requiredVal($name)){

    $errors[] = "name is required";

}elseif (!minVal($name, 3)){

    $errors[] = "name must be more than 3 chars";
}elseif (!maxVal($name, 25)){

    $errors[] = "name must be less than 25 chars";
}

# validation of email 

if (!requiredVal($email)){

    $errors[] = "email is required";

}elseif (!emailVal($email)){

    $errors[] = "please enter a valid email";   
}

#VALIDATION OF MESSAGE

if (!requiredVal($message)){

    $errors[] = "message is required";

}elseif (!minVal($message, 30)){

    $errors[] = "message must be more than 20 chars";

}elseif (!maxVal($message, 100)){

    $errors[] = "message must be less than 100 chars";
}

if (empty($errors)){

    $messges_file = fopen("../Data/messages.csv", "a");
    $ms_data = [$name,$email,$message];
    fputcsv($messges_file, $ms_data);
    fclose($messges_file);
    $_SESSION['success'] = "Message sent successfully!";
    redirect("../NavItem/index.php");
    die();
}else {
    $_SESSION['errors'] = $errors;
    redirect("../NavItem/contact.php");
    die;
}
}