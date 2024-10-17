<?php

class Manusia {
    public $nik;
    public $nama;


    public  function __construct($nik, $nama){
        $this->nik = $nik;  
        $this->nama = $nama;
    }
    public function cetakMahasiswa(){
        echo "Nik: " . $this->nik . "<br>";
        echo "Nama: " . $this->nama . "<br>";
    }
}

class Mahasiswa extends Manusia {

    public $npm;
    public function __construct($nik, $nama, $npm){
        parent::__construct($nik, $nama);
        $this->npm = $npm;
    }

    public function cetakMahasiswa(){
        parent::cetakMahasiswa();
        echo "NPM: " . $this->npm . "<br>";
    }
}

$obj = new Mahasiswa(1, "tokisaki kurumi", "06.2021.12345");
$obj->cetakMahasiswa();



?>