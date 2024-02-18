//هذه الصفحة تقوم بالبحت عن المنشورات باستخدام اليوزر او الفئة او العنوان
  <?php
require_once $_SERVER["DOCUMENT_ROOT"] . "../reditt/Database/Database.php";
if (isset($_GET['searchQuery'])) {
    $searchQuery = $_GET['searchQuery'];

    // سيتم البحت هنا عن المعلومات المطلوبه متل المنشور 


    $posts = [
        [
            'title' => 'منشور 1',
            'content' => '  المحتوى الخاص بمنشور 1.',
            'timestamp' => '2022-01-01 10:00:00'
        ],
        [
            'title' => 'منشور 2',
            'content' => ' المحتوى الخاص بمنشور 2.',
            'timestamp' => '2022-01-02 12:00:00'
        ],
        [
            'title' => 'منشور 3',
            'content' => ' المحتوى الخاص بمنشور 3.',
            'timestamp' => '2022-01-03 14:00:00'
        ]
    ];


    $searchResults = [];

    foreach ($posts as $post) {
        if (stripos($post['title'], $searchQuery) !== false || stripos($post['content'], $searchQuery) !== false) {
            $searchResults[] = $post;
        }
    }

    if (empty($searchResults)) {
        echo '<p>لا توجد نتائج للبحث.</p>';
    } else {
        foreach ($searchResults as $result) {
            echo '<div class="post"><h3>' . htmlspecialchars($result['title']) . '</h3><p>' . htmlspecialchars($result['content']) . '</p><p class="timestamp">' . $result['timestamp'] . '</p></div>';
        }
    }
}
?>