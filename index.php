<?php
// require_once 'domain_object/node_role.php';

// $obj_role = [];
// $obj_role[] = new role(1, "kasir", "kasir",1, 1000000);
// $obj_role[] = new role(2, "admin", 'admin', 1, 2000000);
// $obj_role[] = new role(3, "manager", 'manager',0, 3000000);

// include 'views/role_list.php';

// foreach($obj_role as $role){
//     echo "id role : ".$
// role->id_peran;
//     echo "<br>";
//     echo "role name : ".$role->nama_peran;
//     echo "<br>";
//     echo "role description : ".$role->desc_peran;
//     echo "<br>";
//     echo "role status : ".$role->status_peran;
//     echo "<br>";
//     echo "role gaji : ".$role->gaji;
//     echo "<br>";
    
// }

require_once 'model/model_role.php';
require_once 'model/model_user.php';
require_once 'model/model_barang.php';
session_start();

if (isset($_GET['modul'])) {
    $modul = $_GET['modul'];
    
}else {
    $modul = 'dasboard';
}

$obj_role = new modelRole();
$obj_user = new modelUser();
$obj_barang = new modelBarang();

switch ($modul) {
    case 'dasboard':
        include 'views/kosong.php';
        break;
        
        case 'role':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        
        switch ($fitur) {
            case 'add':
            $nama_peran = $_POST['nama_peran'];
            $desc_peran = $_POST['desc_peran'];
            $status_peran = $_POST['status_peran'];
            $gaji = $_POST['gaji'];
            $obj_role->addRole($nama_peran, $desc_peran, $status_peran, $gaji);
            header("Location: index.php?modul=role&success=true");
            break;

            case 'delete' :
            // Ambil id_peran dari parameter GET
            $id_peran = $_GET['id_peran'];
            $obj_role->deleteRole($id_peran);
            header("Location: index.php?modul=role");
            break;

            case 'edit' :
            $id_peran = $_GET['id_peran'];
            $obj_role = $obj_role->getRoleById($id_peran);
            include 'views/role_update.php';
            break;

            case 'update' :
            $id_peran = $_POST['id_peran'];
            $nama_peran = $_POST['nama_peran'];
            $desc_peran = $_POST['desc_peran'];
            $status_peran = $_POST['status_peran'];
            $gaji = $_POST['gaji'];
            $obj_role->updateRole($id_peran, $nama_peran, $desc_peran, $status_peran, $gaji);
            header("Location: index.php?modul=role");
            break;


            default : 
            $Roles = $obj_role->getRoles();
            include 'views/role_list.php';
            }
            break;

        case 'user':
            $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
            switch ($fitur) {

                case 'input':
                $Users = $obj_user->getUsers();
                $roles = $obj_role->getRoles();
                include 'views/user_input.php';
                break;

                case 'add':
                $username = $_POST['username'];
                $password = $_POST['password'];
                $role = $_POST['nama_peran'];
                $obj_user->addUser($username, $password, $role);
                header("Location: index.php?modul=user");
                break;

                case 'delete':
                $id_user = $_GET['id_user'];
                $obj_user->deleteUser($id_user);
                header("Location: index.php?modul=user");
                break;

                case 'edit':
                $id_user = $_GET['id_user'];  
                
                $obj_user = $obj_user->getUserById($id_user);
                $roles = $obj_role->getRoles();
                include 'views/user_update.php';
                break;

                case 'update':
                $id_user = $_POST['id_user'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $role = $_POST['nama_peran'];
                $obj_user->updateUser($id_user, $username, $password, $role);
                header("Location: index.php?modul=user");
                break;

            
                default :
                $Users = $obj_user->getUsers();
                include 'views/user_list.php';

                break;
            }
            break;


    case 'barang':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        switch ($fitur) {
            case 'input':
            $Barangs = $obj_barang->getBarangs();
            include 'views/barang_input.php';
            break;
            case 'add':
            $nama_barang = $_POST['nama_barang'];
            $harga_barang = $_POST['harga_barang'];
            $status_barang = $_POST['status_barang'];
            $stok_barang = $_POST['stok_barang'];

            $obj_barang->addBarang($nama_barang, $harga_barang, $status_barang, $stok_barang);
            header("Location: index.php?modul=barang");
            break;

            case 'edit':
            $id_barang = $_GET['id_barang'];
            $obj_barang = $obj_barang->getBarangById($id_barang);
            include 'views/barang_update.php';
            break;

            case 'update':
            $id_barang = $_POST['id_barang'];
            $nama_barang = $_POST['nama_barang'];
            $harga_barang = $_POST['harga_barang'];
            $status_barang = $_POST['status_barang'];
            $stok_barang = $_POST['stok_barang'];
            $obj_barang->updateBarang($id_barang, $nama_barang, $harga_barang, $status_barang, $stok_barang);
            header("Location: index.php?modul=barang");
            break;

            case 'delete' :
            // Ambil id_peran dari parameter GET
            $id_barang = $_GET['id_barang'];
            $obj_barang->deleteBarang($id_barang);
            header("Location: index.php?modul=barang");
            break;
            default :
            $Barangs = $obj_barang->getBarangs();
            include 'views/barang_list.php';
            break;


        }
            
    }
?>
