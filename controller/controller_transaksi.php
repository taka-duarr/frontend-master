<?php
require_once 'model/model_transaksi.php';
require_once 'model/model_user.php';
require_once 'model/model_barang.php';
require_once 'model/model_detail_transaksi.php';

class TransaksiController {
    private $transaksiModel;
    private $userModel;
    private $barangModel;
    private $detailTransaksiModel;

    public function __construct() {
        $this->transaksiModel = new ModelTransaksi();
        $this->userModel = new modelUser();
        $this->barangModel = new modelBarang();
        $this->detailTransaksiModel = new modelDetailTransaksi();
    }

    public function index() {
        $transaksis = $this->transaksiModel->getAllTransaksi();
        include 'views/transaksi_list.php';
    }

    public function input() {
        $customers = $this->userModel->getUsers();
        $barangs = $this->barangModel->getBarangs();
        include 'views/transaksi_input.php';
    }

    public function add() {
        $id_user = $_POST['customer'];
        $barang_ids = $_POST['barang'];
        $jumlahs = $_POST['jumlah'];
        $detail_transaksis = [];

        foreach ($barang_ids as $key => $id_barang) {
            $barang = $this->barangModel->getBarangById($id_barang);
            $subtotal = $this->detailTransaksiModel->getSubtotal($id_barang, $jumlahs[$key]);
            $detail_transaksi = new DetailTransaksi(4, $barang, $jumlahs[$key], $subtotal);
            $detail_transaksis[] = $detail_transaksi;
        }

        if (!empty($detail_transaksis)) {
            $this->transaksiModel->addTransaksi($id_user, $detail_transaksis);
            header("Location: index.php?modul=transaksi");
        } else {
            echo "Detail transaksi tidak boleh kosong";
            exit;
        }
    }
}
?>
