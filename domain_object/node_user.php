<?php

require_once ('domain_object/node_role.php');

class user {
    public $id_user;
    public $username;
    public $password;
    public $role;

    function __construct($id_user, $username, $password, role $role) {
        $this->id_user = $id_user;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }
}

    

?>