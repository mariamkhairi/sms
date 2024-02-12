<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/reditt/php/userup.php";
// استخلاص بيانات المستخدم من النموذج
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$name = $_POST['name'];

// الاتصال بقاعدة البيانات
$host = "localhost";
$user = "root";
$pass = "";
$db = "social";

$conn = new mysqli($hoste, $user, $pass, $db);

// التحقق من الاتصال بقاعدة البيانات
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// تحديث بيانات المستخدم في قاعدة البيانات
$sql = "UPDATE users SET password='$password', email='$email', gender='$gender', age='$age', name='$name' WHERE username='$username'";

if ($conn->query($sql) === TRUE) {
    echo "تم تحديث البيانات بنجاح!";
} else {
    echo "حدث خطأ أثناء تحديث البيانات: " . $conn->error;
}

// إغلاق اتصال قاعدة البيانات
$conn->close();
?>



<h3>Update Data</h3>

<form method="POST" action="../php/update_info.php">
    <input type="text" name="username" value="<?php echo $user->getUsername() ?>" placeholder="Enter Username" required>
    <input type="password" name="password" placeholder="Enter New Password" required>
    <input type="email" name="email" value="<?php echo $user->getEmail() ?>" placeholder="Enter New Email" required>
    <input type="text" name="gender" value="<?php echo $user->getGender() ?>" placeholder="Enter Gender" required>
    <input type="text" name="age" value="<?php echo $user->getAge() ?>" placeholder="Enter Age" required>
    <input type="text" name="name" value="<?php echo $user->getName() ?>" placeholder="Enter Name" required>

    <input type="submit" name="update" value="Update">
</form>