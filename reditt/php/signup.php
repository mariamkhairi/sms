<?php
//require_once $_SERVER["DOCUMENT_ROOT"] . "../reditt/Database/Database.php";
//require_once $_SERVER["DOCUMENT_ROOT"] . "../reditt/Database/Database/SqlServices.php";

class User {
    private $username;
    private $password;
    private $email;
    private $gender;
    private $age;
    private $name;
    private $connection;
    
    public function __construct( $username, $password, $email, $gender ,$age ,$name, $connection) {
        
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->gender = $gender;
        $this->age = $age;
        $this->name = $name;
        $this->connection = $connection;
    }

    public function isValidAge() {
        return $this->age >= 18;
    }
    
    public function registerUser() {
        // تنفيذ عملية إدخال البيانات في جدول المستخدمين في قاعدة البيانات
        $query = "INSERT INTO users (username, password,email, gender ,age ,name) VALUES ('$this->username', '$this->password', '$this->email', $this->gender,  '$this->age' '$this->name')";
        $result = mysqli_query($this->connection, $query);

        if ($result) {
            echo "تم تسجيل المستخدم بنجاح!";
        } else {
            echo "حدث خطأ أثناء تسجيل المستخدم.";
        }
    }

    public function display_user_details(){
        echo $this->username;
    }
}

// استدعاء قاعدة البيانات
$host = "localhost";
$user = "root";
$pass = "";
$db = "social";

$connection = mysqli_connect($host, $user, $pass, $db);

// التحقق من وجود اتصال ناجح
if (!$connection) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}

// التحقق من إرسال البيانات من النموذج HTML
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $name = $_POST['name'];
    
    try {
        $user = new User($username, $password,$email ,$gender,$age ,$name, $connection);
        
        if ($user->isValidAge()) {
            $user->registerUser();
        } else {
            throw new Exception("يجب أن يكون عمر المستخدم 18 سنة فما فوق.");
        }
    } catch (Exception $e) {
        echo "حدث خطأ: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Social</title>
        <link rel="stylesheet" href="../css/cs.css">
        <link rel="icon" href="photo/logo.jpeg">
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
                </ul>
            </div>
        </nav>
            <main>
        <div class="login">
            <h2>sign-up</h2>
            <form method="POST" action="../php/register.php">
              <label for="username">name</label>
              <input type="text" id="name" name="name">
              <br>
              <br>
              <label for="username">Username:</label>
              <input type="text" id="username" name="username">
              <br>
              <br>
              <label for="password">password:</label>
              <input type="password" id="password" name="password">
              <br>
              <br>
              <label for="age">age:</label>
              <input type="number"  name="age">
              <br>
              <br>
              <label for="email">email:</label>
              <input type="text"  name="email">
              <br>
              <br>
              <label for="gender">gender:</label>
              <input type="radio" name="gender " value="male">male
              <input type="radio" name="gender " value="female">female
              <br>
              <br>
              <input type="submit" value="sign-up">
            </form>
        </div>
            </main>
        
    </body>
</html>