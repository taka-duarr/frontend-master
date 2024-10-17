<?php
    require_once 'model/model_role.php';
    $objRole = new modelRole();
    $objRole->addRole("kasir", "kasir", 1, 20000);
    $objRole->addRole("admin", "admin", 1, 20000);
    $objRole->addRole("manager", "manager", 0, 70000);

    foreach ($objRole->getRoles() as $role){
        echo "id role : ".$role->id_peran;
        echo "<br>";
        echo "role name : ".$role->nama_peran;
        echo "<br>";
        echo "role description : ".$role->desc_peran;
        echo "<br>";
        echo "role status : ".$role->status_peran;
        echo "<br>";
        echo "role gaji : ".$role->gaji;
        echo "<br>";
    }
?>