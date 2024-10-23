<?php
class Manusia{
    public $nik;
    public $nama;

    
    public function cetak(){
        echo "Nik: " . $this->nik . "<br>";
        echo "Nama: " . $this->nama . "<br>";
    }
}

class Mahasiswa{
    public $npm;
    public $manusia;

    public function __construct($Manusia, $npm){
        $this->manusia = $Manusia;
        $this->npm = $npm;
    }

    public function cetakMahasiswa(){
        $this->manusia->cetak();
        echo "NPM: " . $this->npm . "<br>";
    }
}
?>