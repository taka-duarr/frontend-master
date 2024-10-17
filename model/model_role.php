<?php
    require_once ('domain_object/node_role.php');
    class modelRole{
        private $roles = [];
        private $nextId = 1;
    

    // public function __construct(){
    //     if(isset($_SESSION['roles'])){
    //         $this->roles = unserialize($_SESSION['roles']);
    //         $this->nextId = count($this->roles) + 1;
    //     }else{
    //         $this->initialiazeDefaultRole();
    //     }
    //     }

        // public function initialiazedefaultrole(){
        //     $this->addRole("admin", "administrator", 1);
        //     $this->addRole("user", "user", 1);
        //     $this->addRole("guest", "guest", 1);
        // }

        public function addRole( $nama_peran, $desc_peran, $status_peran, $gaji){
            $role = new role($this->nextId ++, $nama_peran, $desc_peran, $status_peran, $gaji);
            $this->roles[] = $role;
            $this->saveToSession();
        }

        private function saveToSession(){
            $_SESSION['roles'] = serialize($this->roles);
        }

        public function getRoles(){
            return $this->roles;
        }
    }
?>