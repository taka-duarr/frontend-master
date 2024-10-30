<?php
require_once 'domain_object/node_user.php';
require_once 'model_role.php';

class modelUser {
    private $users = [];
    private $nextId = 1;
    private $modelrole;

    public function __construct() {
        $this->modelrole = new modelRole();
        if (isset($_SESSION['users'])) {
            $this->users = unserialize($_SESSION['users']);
            $this->nextId = count($this->users) + 1;
        } else {
            $this->initializeDefaultUser();
        }
    }

    public function initializeDefaultUser() {
        $this->addUser("firman", "admin", "admin");
        $this->addUser("admin", "admin", "admin");
        $this->addUser("user", "user", "user");
    }

    public function addUser($username, $password, $rolename) {
        $role = $this->modelrole->getRolesByName($rolename);
        if ($role) {
            $user = new user($this->nextId++, $username, $password, $role);
            $this->users[] = $user;
            $this->saveToSession();
        }
    }

    private function saveToSession() {
        $_SESSION['users'] = serialize($this->users);
    }

    public function getUsers() {
        return $this->users;
    }

  
    public function getUserById($id_user) {
    foreach ($this->users as $user) {
        if ($user->id_user == $id_user) {
            return $user;
        }
    }
    return null;
}


    public function deleteUser($id_user) {
        foreach ($this->users as $key => $user) {
            if ($user->id_user == $id_user) {
                unset($this->users[$key]);
                $this->saveToSession();
                break;
            }
        }
    }

    public function updateUser($id_user, $username, $password, $role) {
        foreach ($this->users as $key => $user) {
            if ($user->id_user == $id_user) {
                $user->username = $username;
                $user->password = $password;
                $rolename = $this->modelrole->getRolesByName($role);
                $user->role = $rolename;
                $this->saveToSession();
                break;
            }
        }
    }

    public function getUserByname($username) {
        foreach ($this->users as $user) {
            if ($user->username == $username) {
                return $user;
            }
        }
        return null;
    }
        
}
?>
