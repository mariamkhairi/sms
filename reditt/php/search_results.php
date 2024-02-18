//هذه الصفحة تقوم بالبحت باستخدام اليوزر او الفئة او العنوان عن المنشورات //
<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "../reditt/Database/Database.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "../reditt/php/post.php";
// استعلام قاعدة البيانات للحصول على المشاركات
$db = new Database();
$connection = $db->getConnection();

if (isset($_GET['searchQuery'])) {
    $searchQuery = $_GET['searchQuery'];

    // استعلام قاعدة البيانات للبحث عن المشاركات
    $query = "SELECT * FROM posts WHERE username LIKE '%$searchQuery%' OR category LIKE '%$searchQuery%' OR title LIKE '%$searchQuery%'";
    $statement = $connection->prepare($query);
    $statement->execute();
    $searchResults = $statement->fetchAll(PDO::FETCH_ASSOC);

    if (empty($searchResults)) {
        echo '<p>لا توجد نتائج للبحث.</p>';
    } else {
        foreach ($searchResults as $result) {
            echo '<div class="post"><h3>' . htmlspecialchars($result['title']) . '</h3><p>' . htmlspecialchars($result['content']) . '</p><p class="timestamp">' . $result['timestamp'] . '</p></div>';
        }
    }
}

// قم بإغلاق اتصال قاعدة البيانات بعد الانتهاء من الاستعلام
$connection = null;
?>