<?php
require_once 'model/model_barang.php';

class BarangController {
    private $barangModel;

    public function __construct() {
        $this->barangModel = new modelBarang();
    }

    public function index() {
        $Barangs = $this->barangModel->getBarangs();
        include 'views/barang_list.php';
    }

    public function input() {
        include 'views/barang_input.php';
    }

    public function add() {
        $nama_barang = $_POST['nama_barang'];
        $harga_barang = $_POST['harga_barang'];
        $status_barang = $_POST['status_barang'];
        $stok_barang = $_POST['stok_barang'];
        $this->barangModel->addBarang($nama_barang, $harga_barang, $status_barang, $stok_barang);
        header("Location: index.php?modul=barang");
    }

    public function edit($id_barang) {
        $barang = $this->barangModel->getBarangById($id_barang);
        include 'views/barang_update.php';
    }

    public function update() {
        $id_barang = $_POST['id_barang'];
        $nama_barang = $_POST['nama_barang'];
        $harga_barang = $_POST['harga_barang'];
        $status_barang = $_POST['status_barang'];
        $stok_barang = $_POST['stok_barang'];
        $this->barangModel->updateBarang($id_barang, $nama_barang, $harga_barang, $status_barang, $stok_barang);
        header("Location: index.php?modul=barang");
    }

    public function delete($id_barang) {
        $this->barangModel->deleteBarang($id_barang);
        header("Location: index.php?modul=barang");
    }
}
?>
