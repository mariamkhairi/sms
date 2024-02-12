<?php
$file = 'posts.txt';
if (file_exists($file)) {
    $posts = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $posts = array_reverse($posts);

    foreach ($posts as $post) {
        $postParts = explode('(', $post);
        $postText = trim($postParts[0]);
        $timestamp = substr(trim($postParts[1]), 0, -1);
        echo '<div class="post"><p>' . htmlspecialchars($postText) . '</p><p class="timestamp">' . $timestamp . '</p></div>';
    }
}
?>