<?php

require_once 'model/model_user.php';



class LoginController {
    private $userModel;

    public function __construct() {
        $this->userModel = new modelUser(); //aggregation karena memanggil objek dari model user
    }

public function login() {
        $error = null;

        $users = $this->userModel->getUsers();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            foreach ($users as $user) {
                if ($user->username == $username && $user->password == $password ) {
                    header("Location: index.php?modul=role");
                    $user = $this->userModel->getUserByname($username);

    
                    $_SESSION['username_login'] = $user;

                }
            }
        }

       
        include 'views/login.php';
    
    }
    

    public function logout() {
        header("Location: index.php?modul=login");
        exit;
    }
}
?>
