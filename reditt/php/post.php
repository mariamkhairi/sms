<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "../reditt/Database/Database.php";
  
class Post
{
private $postText;


public function setPostText($text)
{
    $this->postText = $text;
}

public function getPostText()
{
    return $this->postText;
}
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
try {
// التحقق من وجود النص المدخل في النموذج
if (isset($_POST['postText']) && !empty($_POST['postText'])) {
// قم بالاتصال بقاعدة البيانات
$db = new PDO("mysql:host=localhost;dbname=social","root", "");


        // إعداد الاستعلام لإدخال المشاركة في الجدول
        $query = "INSERT INTO posts (postText) VALUES (:postText)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':postText', $_POST['postText']);
        $stmt->execute();

        echo "تم نشر المشاركة بنجاح: " . $_POST['postText'];
    } else {
        throw new Exception("يرجى إدخال نص المشاركة.");
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
        <title >Social</title>
    <link rel="stylesheet"  href="../css/cs.css">
    <link rel="stylesheet" type="text/css" href="../css/post.css">
    <link rel="icon"  href="../photo/logo.jpeg">
    </head>
    
</head>
  
<body>
    <header>
    <center><h1>posts</h1></center>
    </header>

    <div class="comment-form">
        <h3>Add post</h3>

    <div class="post-form">
        <form action="../php/process_post.php" method="post">
            <textarea name="postText" placeholder="write your Post"></textarea>
            <button type="submit">to publish </button>
        </form>
    </div>
        
   

    <div class="post-container">
        <?php include '/php/process_post.php'; ?>
    </div>

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




</body>
</html>