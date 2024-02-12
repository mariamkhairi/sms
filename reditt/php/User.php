<?php
//الاسم مريم الهمالي //
require_once $_SERVER["DOCUMENT_ROOT"] . "../reditt/Database/Database.php";
//require_once $_SERVER["DOCUMENT_ROOT"] . "../reditt/Database/Database/SqlServices.php";
class User {
    private $username;
    private $password;
    
    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }
    
    public function validate() {
        if (empty($this->username) || empty($this->password)) {
            throw new Exception('يرجى إدخال اسم المستخدم وكلمة المرور.');
        }
       
        return true; 
    }
    public function display_user_details(){
        echo $this->username;
    }
}



?>

