<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "../php/User.php";

    
    if (isset($_POST['username'])) {

        $username = $_POST['username'];
      //  echo "<p>Welcome, $username!</p>";
        echo "<p>This is the welcome page for registered users.</p>";
        
        $user= new User($username,"mypassword");
        $user->display_user_details();
        
    } else {
        // في حالة لم يتم تسجيل الدخول، يتم إعادة التوجيه إلى صفحة تسجيل الدخول
        //header('Location: User.php');
       // exit;
    }
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Social</title>
        <link rel="stylesheet" href="../css/cs.css">
        <link rel="icon" href="../photo/logo.jpeg">
    </head>
    <body>
        <header>
            <center><h1>Social</h1></center>
        </header>
        <nav>
            
            <div id="navbar">
                <ul>
                    <li><a href="home.html">Home</a></li>
                    <li><a href="post.html">Add post</a></li>
                    <li><a href="Add comment.html">Add comment</a></li>
                    <li><a href="search.html">search</a></li>
                    <li><a href="signup.html">sign-up</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="logout.html">logout</a></li>
                </ul>
            </div>
        </nav>
            <main>
        <div class="login">
            <h2>Login</h2>
            <form method="POST" action="../php/User.php">
              <label for="username">Username:</label>
              <input type="text" id="username" name="username">
              <br>
              <br>
              <label for="password">Password:</label>
              <input type="password" id="password" name="password"><br><br>
              <input type="submit" value="Login">
            </form>
        </div>
            </main>
        
    </body>
</html>
