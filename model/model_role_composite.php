<?php
class Manusia{
    public $nik;
    public $nama;

    public function cetak(){
        echo "Nik: " . $this->nik . "<br>";
        echo "Nama: " . $this->nama . "<br>";
    }
}

class Mahasiswa {
    public $npm;
    public $manusia;

    public function __construct($nik, $nama, $npm){
        $this -> manusia = new Manusia();
        $this->manusia->nama= $nik;
        $this->manusia-> nik= $nama;
        $this->npm= $npm;
    }

    public function cetakMahasiswa(){
        $this->manusia->cetak();
        echo "NPM: " . $this->npm . "<br>";
    }
}


?>