<?php
require_once 'model/model_user.php';
require_once 'model/model_role.php';

class UserController {
    private $userModel;
    private $roleModel;

    public function __construct() {
        $this->userModel = new modelUser();
        $this->roleModel = new modelRole();
    }

    public function index() {
        $Users = $this->userModel->getUsers();
        include 'views/user_list.php';
    }

    public function input() {
        $Users = $this->userModel->getUsers();
        $roles = $this->roleModel->getRoles();
        include 'views/user_input.php';
    }

    public function add() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['nama_peran'];
        $this->userModel->addUser($username, $password, $role);
        header("Location: index.php?modul=user");
    }

    public function delete($id_user) {
        $this->userModel->deleteUser($id_user);
        header("Location: index.php?modul=user");
    }

 

    public function edit($id_user) {
        $user = $this->userModel->getUserById($id_user);
        $roles = $this->roleModel->getRoles();
        include 'views/user_update.php';
    }

    public function update() {
        $id_user = $_POST['id_user'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['nama_peran'];
        $this->userModel->updateUser($id_user, $username, $password, $role);
        header("Location: index.php?modul=user");
    }
}
?>
