<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="../reditt/css/cs.css">
</head>
<body>
    <h1>Welcome to the Social</h1>

    <?php
    session_start();

    
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "<p>Welcome, $username!</p>";
        echo "<p>This is the welcome page for registered users.</p>";
        
        
    } else {
        // في حالة لم يتم تسجيل الدخول، يتم إعادة التوجيه إلى صفحة تسجيل الدخول
        header('Location: ../reditt/php/User.php');
        exit;
    }
    ?>

    <a href="logout.php">Logout</a>  

</body>
</html>