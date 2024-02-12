<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "../reditt/Database/Database.php";
class Comment
{
    private $name;
    private $comment;

    public function __construct($name, $comment)
    {
        $this->name = $name;
        $this->comment = $comment;
    }

    public function isValid()
    {
        // تحقق من صحة البيانات هنا
        if (empty($this->name) || empty($this->comment)) {
            return false;
        }

        // يمكنني إضافة المزيد من الشروط والتحققات المطلوبة

        return true;
    }

    public function save()
    {
        // قم بتنفيذ الإجراءات اللازمة لحفظ التعليق هنا
        // يمكنني استخدام قاعدة بيانات أو ملف للحفظ
    }
}

// معالجة إضافة التعليق
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $commentText = $_POST['comment'];

    try {
        $comment = new Comment($name, $commentText);

        if ($comment->isValid()) {
            $comment->save();
            echo 'تم حفظ التعليق بنجاح.';
        } else {
            echo 'يرجى إدخال جميع الحقول المطلوبة.';
        }
    } catch (Exception $e) {
        echo 'حدث خطأ أثناء معالجة التعليق.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Social - Comments</title>
    <link rel="stylesheet" href="../css/cs.css">
    <link rel="icon" href="../photo/logo.jpeg">
</head>
<body>
    <header>
        <center><h1>Comments</h1></center>
    </header>

    <nav>
        <div id="navbar">
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="post.html">Add post</a></li>
                <li><a href="Add comment.html">Add comment</a></li>
                <li><a href="search.html">Search</a></li>
                <li><a href="signup.html">Sign-up</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="logout.html">logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="comment-form">
        <h3>Add a Comment</h3>
        <form method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required> 
            <br>
            <br>
            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" placeholder="write here"></textarea>
            <br>
            <br>
            <button type="submit">Add</button>
        </form>
    </div>
</body>
</html>