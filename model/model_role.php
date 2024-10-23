<?php
    require_once ('domain_object/node_role.php');
    class modelRole{
        private $roles = [];
        private $nextId = 1;
    

    public function __construct(){
        if(isset($_SESSION['roles'])){
            $this->roles = unserialize($_SESSION['roles']);
            $this->nextId = count($this->roles) + 1;
        }else{
            $this->initialiazeDefaultRole();
        }
        }

        public function initialiazeDefaultRole(){
            $this->addRole("admin", "administrator", 1,2000);
            $this->addRole("user", "user", 1,5000);
            $this->addRole("guest", "guest", 1,10000);
        }

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

        public function getRoleById($id_peran){
            foreach($this->roles as $role){
                if($role->id_peran == $id_peran){
                    return $role;
                }
            }
            return null;
        }

        public function updateRole($id_peran, $nama_peran, $desc_peran, $status_peran, $gaji){
            foreach($this->roles as $role){
                if($role->id_peran == $id_peran){
                    $role->nama_peran = $nama_peran;
                    $role->desc_peran = $desc_peran;
                    $role->status_peran = $status_peran;
                    $role->gaji = $gaji;
                    $this->saveToSession();
                    return true;
                }
            }
            return false;
        }

        public function deleteRole($id_peran){
            foreach($this->roles as $key => $role){
                if($role->id_peran == $id_peran){
                    unset($this->roles[$key]);
                    $this->roles = array_values($this->roles);
                    $this->saveToSession();
                    return true;
                }
            }
            return false;
        }

        public function getRolesByName($nama_peran){
            foreach($this->roles as $role){
                if($role->nama_peran == $nama_peran){
                    return $role;
                }
            }
        }
    }
?>