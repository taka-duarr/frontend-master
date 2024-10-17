<?php

require_once 'model/model_role_inheritance.php';
$objManusia = new Manusia();
$objManusia->nama  = "Budi";
$objManusia->nik   = 1;

$objMahasiswa = new Mahasiswa($objManusia,7899);
$objMahasiswa->cetakMahasiswa();
?>