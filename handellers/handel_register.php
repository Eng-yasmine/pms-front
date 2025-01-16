<?php
if (session_status() == PHP_SESSION_NONE) session_start();
include '../core/functions_and_validations.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = htmlspecialchars(htmlentities(trim($_POST['username'])));
    $user_email = htmlspecialchars(htmlentities(trim($_POST['useremail'])));
    $user_password = htmlspecialchars(htmlentities(trim($_POST['userpassword'])));
    $user_password = password_hash($user_password, PASSWORD_DEFAULT);

    // تخصيص دور المستخدم
    $admin_name = 'admin';
    $user = 'user';
    $_POST['role'] = ['admin' => $admin_name, 'user' => $user];

    $errors = [];

    // التحقق من اسم المستخدم
    if (empty($user_name)) {
      
        $errors[] = 'Name is required';
    }
    if (strlen($user_name) < 6) {
     
        $errors[] = 'Sorry, username must be greater than 6 characters';
    }
    if (strlen($user_name) > 15) {
      
        $errors[] = 'Sorry, username must be less than 15 characters';
    }

    // التحقق من البريد الإلكتروني
    if (empty($user_email)) {
       
        $errors[] = 'Sorry, email is required';
    }
    if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        
        $errors[] = 'Sorry, email is not valid';
    }

    // التحقق من كلمة المرور
    if (empty($user_password)) {
       
        $errors[] = 'Sorry, password is required';
    }
    if (strlen($user_password) < 8) {
       
        $errors[] = 'Sorry, password must be greater than 8 characters';
    }
    if (strlen($user_password) > 10) {
        
        $errors[] = 'Sorry, password must be less than 10 characters';
    }

    // التحقق من دور المستخدم
    if (empty($_POST['role'])) {
       
        $errors[] = 'Sorry, role is required';
    }

    // إذا لم يوجد أخطاء
    if (empty($errors)) {
        $user_data = [
            'user_name' => $user_name,
            'user_email' => $user_email,
            'user_password' => $user_password,
            'role' => $_POST['role']
        ];

        // التحقق من كتابة البيانات في الملف
      
        $file = fopen('../Data/userdata.csv', 'a');
        if ($file) {
            fwrite($file, $user_data['user_name'] . ',' . $user_data['user_email'] . ',' . $user_data['user_password'] . ',' . $user_data['role'] . PHP_EOL);
            fclose($file);

            // تخزين بيانات المستخدم في الجلسة
            $_SESSION['auth'] = $user_data;

            // التوجيه إلى الصفحة الرئيسية
            header("Location: ../NavItem/index.php");
            exit();
        } else {
            $errors[] = 'Failed to open the file for writing';
        }
    }

    // تخزين الأخطاء في الجلسة
    $_SESSION['errors'] = $errors;
 
    header("Location: ../NavItem/register.php");
    exit();
} else {
  
    $errors[] = 'Please enter valid data';
    $_SESSION['errors'] = $errors;
    header("Location: ../NavItem/register.php");
    exit();
}
?>