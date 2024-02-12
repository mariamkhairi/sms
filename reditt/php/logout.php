<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/cs.css">
    <title>Log Out</title>
</head>
<body>
<header>
            <center><h1>Log Out</h1></center>
        </header>

    <?php
    session_start();

    // تسجيل الخروج من الجلسة
    session_destroy();
    ?>

    <p>تم تسجيل الخروج بنجاح.</p>
    <p><a href="login.html">تسجيل الدخول مرة أخرى</a></p>
</body>
</html>