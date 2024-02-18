<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "../reditt/Database/Database.php";
    class User {
        private $username;
        private $password;
        private $email;
        private $gender;
        private $age;
        private $name;
    
        public function __construct($username, $password, $email, $gender, $age, $name) {
            $this->username = $username;
            $this->password = $password;
            $this->email = $email;
            $this->gender = $gender;
            $this->age = $age;
            $this->name = $name;
        }

    public function registerUser() {
        // قم بإعداد اتصال قاعدة البيانات
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "social";



        try {
            $conn = new PDO("mysql:localhost=$host;social=$db", $user, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // إعداد استعلام SQL لإدخال البيانات
            $query = "INSERT INTO users (username, password, email, gender, age, name) VALUES (:username, :password, :email, :gender, :age, :name)");

            $stmt = $conn->prepare($query);

            // ربط قيم المعلمات
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':gender', $this->gender);
            $stmt->bindParam(':age', $this->age);
            $stmt->bindParam(':name', $this->name);

            // تنفيذ استعلام SQL
            $stmt->execute();

            echo "تم حفظ المستخدم بنجاح!";
        } catch(PDOException $e) {
            echo "حدث خطأ: " . $e->getMessage();
        }

        // إغلاق الاتصال بقاعدة البيانات
        $conn = null;
    }
}

// التحقق من إرسال النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استلام القيم من النموذج
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $name = $_POST['name'];

    // إنشاء كائن User وتمرير القيم
    $user = new User($username, $password,$email ,$gender,$age ,$name);

    // تسجيل المستخدم
    $user->registerUser();
}

?>