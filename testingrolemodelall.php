<?php





//inheritance
// require_once 'model/model_role_inheritance.php';
// $obj = new Mahasiswa(1, "tokisaki kurumi", "06.2021.12345");
// $obj->cetakMahasiswa();

//composite
require_once 'model/model_role_composite.php';
$objManusia = new Mahasiswa(1, "camellya", 7764);
$objManusia->cetakMahasiswa();

//aggregation
// require_once 'model/model_role_aggregation.php';
// $objManusia = new Manusia();
// $objManusia->nama  = "Budi tabuti";
// $objManusia->nik   = 123;

// $objMahasiswa = new Mahasiswa($objManusia,7899);
// $objMahasiswa->cetakMahasiswa();
?>