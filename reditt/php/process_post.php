<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/reditt/php/post.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postText = $_POST['postText'];

    
    // هنا يتم تخزين المنشور في ملف نصي
    //$file = 'posts.txt';
    $timestamp = date('Y-m-d H:i:s');
    $data = $postText . ' (' . $timestamp . ')' . PHP_EOL;
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

    // إعادة توجيه المستخدم إلى صفحة المنشورات
    //header('Location: ../php/post.html');
    exit();
}
?>