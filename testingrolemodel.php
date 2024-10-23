<?php
    require_once 'model/model_role.php';

    //create model dan view all
    
    // $objRole = new modelRole();
    // $objRole->addRole("kasir", "kasir", 1, 20000);
    // $objRole->addRole("admin", "admin", 1, 20000);
    // $objRole->addRole("manager", "manager", 0, 70000);

    // foreach ($objRole->getRoles() as $role){
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

    // if(isset($_POST['submit_role'])){
    //     $objRole = new modelRole();
    //     $objRole->addRole($_POST['role_name'], $_POST['role_description'], $_POST['role_status'], $_POST['role_gaji']);

    //add new role

    // echo "========default data role============="."<br>";
    // $objRole = new modelRole();
    // foreach ($objRole->getRoles() as $role){
    //     echo "id role : ".$role->id_peran;
    //     echo "<br>";
    //     echo "role name : ".$role->nama_peran;
    //     echo "<br>";
    //     echo "role description : ".$role->desc_peran;
    //     echo "<br>";
    //     echo "role status : ".$role->status_peran;
    //     echo "<br>";
    //     echo "role gaji : ".$role->gaji;
    //     echo "<br>"."<hr>";
    // }
    

    //     echo "==================testing role=================";
    //     echo "<br>";
    //     $objRole->addRole("new role","new role",1,10000);
    //     $objRole->addRole(4, "new role", "new role", 1, 10000);
    //     foreach ($objRole->getRoles() as $role){
    //         echo "id role : ".$role->id_peran;
    //         echo "<br>";
    //         echo "role name : ".$role->nama_peran;
    //         echo "<br>";
    //         echo "role description : ".$role->desc_peran;
    //         echo "<br>";
    //         echo "role status : ".$role->status_peran;
    //         echo "<br>";
    //         echo "role gaji : ".$role->gaji;
    //         echo "<br>"."<hr>";
    //     }

            //update

        //     session_start();
        //     session_destroy();

        //     echo "========default data role============="."<br>";
        //     $objRole = new modelRole();
        //     foreach ($objRole->getRoles() as $role){
        //     echo "id role : ".$role->id_peran;
        //     echo "<br>";
        //     echo "role name : ".$role->nama_peran;
        //     echo "<br>";
        //     echo "role description : ".$role->desc_peran;
        //     echo "<br>";
        //     echo "role status : ".$role->status_peran;
        //     echo "<br>";
        //     echo "role gaji : ".$role->gaji;
        //     echo "<br>"."<hr>";
        // }

        // echo "===============update data role================"."<br>";
        // $objRole->updateRole(1,"agus", "new role", 1, 10000);
        // $objRole->updateRole(2, "taka", "new role", 1, 10000);
        // foreach ($objRole->getRoles() as $role){
        //     echo "id role : ".$role->id_peran;
        //     echo "<br>";
        //     echo "role name : ".$role->nama_peran;
        //     echo "<br>";
        //     echo "role description : ".$role->desc_peran;
        //     echo "<br>";
        //     echo "role status : ".$role->status_peran;
        //     echo "<br>";
        //     echo "role gaji : ".$role->gaji;
        //     echo "<br>"."<hr>";
        // }

        //delete

        session_start();
        session_destroy();

        echo "========default data role============="."<br>";
        $objRole = new modelRole();
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
        echo "<br>"."<hr>";
    }

    echo "===============delete data role================"."<br>";
    $objRole->deleteRole(1);
   
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
        echo "<br>"."<hr>";
    }
    
        
    
?>