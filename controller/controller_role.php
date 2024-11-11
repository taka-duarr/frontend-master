<?php
require_once 'model/model_role.php';



class RoleController {
    private $roleModel;

    public function __construct() {
        $this->roleModel = new modelRole();
    }

    public function index() {
        $Roles = $this->roleModel->getRoles();
        include 'views/role_list.php';
    }

    public function add() {
        $nama_peran = $_POST['nama_peran'];
        $desc_peran = $_POST['desc_peran'];
        $status_peran = $_POST['status_peran'];
        $gaji = $_POST['gaji'];
        $this->roleModel->addRole($nama_peran, $desc_peran, $status_peran, $gaji);
        header("Location: index.php?modul=role&success=true");
    }

    public function input() {
        include 'views/role_input.php';
        
    }

    public function delete($id_peran) {
        $this->roleModel->deleteRole($id_peran);
        header("Location: index.php?modul=role");
    }

    public function edit($id_peran) {
        $role = $this->roleModel->getRoleById($id_peran);
        include 'views/role_update.php';
    }

    public function update() {
        $id_peran = $_POST['id_peran'];
        $nama_peran = $_POST['nama_peran'];
        $desc_peran = $_POST['desc_peran'];
        $status_peran = $_POST['status_peran'];
        $gaji = $_POST['gaji'];
        $this->roleModel->updateRole($id_peran, $nama_peran, $desc_peran, $status_peran, $gaji);
        header("Location: index.php?modul=role");
    }
}
?>
