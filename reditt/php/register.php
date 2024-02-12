<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "../reditt/php/signup.php";
//require_once $_SERVER["DOCUMENT_ROOT"] . "../reditt/Database/Database.php";
    
    if (isset($_POST['username'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        //$gender = $_POST['gender'];
        $age = $_POST['age'];
       // $name = $_POST['name'];
      //  echo "<p>Welcome, $username!</p>";
        echo "<p>تم تسجيل المستخدم بنجاح!</p>";
       
        
        $user= new User($username, $password,$email, $gender ,$age ,$name,"mypassword");
        $user->display_user_details();
        
    } else {
        // في حالة لم يتم تسجيل الدخول، يتم إعادة التوجيه إلى صفحة تسجيل الدخول
        //header('Location: User.php');
       // exit;
    }
    ?>