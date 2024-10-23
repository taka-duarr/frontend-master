<?php
// require_once 'domain_object/node_role.php';

// $obj_role = [];
// $obj_role[] = new role(1, "kasir", "kasir",1, 1000000);
// $obj_role[] = new role(2, "admin", 'admin', 1, 2000000);
// $obj_role[] = new role(3, "manager", 'manager',0, 3000000);

// include 'views/role_list.php';

// foreach($obj_role as $role){
//     echo "id role : ".$role->id_peran;
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
session_start();


if (isset($_GET['modul'])) {
    $modul = $_GET['modul'];
    
}else {
    $modul = 'dasboard';
}

switch ($modul) {
    case 'dasboard':
        include 'views/kosong.php';
        break;
        
        case 'role':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        $obj_role = new modelRole();
        switch ($fitur) {
            case 'add':
            $nama_peran = $_POST['nama_peran'];
            $desc_peran = $_POST['desc_peran'];
            $status_peran = $_POST['status_peran'];
            $gaji = $_POST['gaji'];
            $obj_role->addRole($nama_peran, $desc_peran, $status_peran, $gaji);
            header("Location: index.php?modul=role");
                break;
                default : 
        $Roles = $obj_role->getRoles();
        include 'views/role_list.php';
            }
        break;
            
    }
?>
