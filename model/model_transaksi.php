<?php
require_once 'domain_object/node_transaksi.php';
require_once 'model/model_barang.php';
require_once 'model/model_user.php';
require_once 'model/model_detail_transaksi.php';

class ModelTransaksi
{
    public $modelBarang;
    public $modelTransaksi;
    private $nextId = 1;
    public $modelUser;
    public $modelDetail;

    public function __construct()
    {
        $this->modelBarang = new ModelBarang();
        $this->modelUser = new modelUser();
        $this->modelDetail = new ModelDetailTransaksi();
        if (isset($_SESSION['transaksi'])) {
            $this->modelTransaksi = unserialize($_SESSION['transaksi']);
            $this->nextId = $this->getMaxTransaksiId() + 1;
        } else {
            // $this->initializeDefaultTransaksi();
        }
    }


    public function addTransaksi($id_user, $detail_transaksis)
    {
        $user = $this->modelUser->getUserById($id_user);

        // Hitung total transaksi dengan menjumlahkan subtotal dari detail transaksi
        $transaksi_total = 0;
        foreach ($detail_transaksis as $detail) {
            $transaksi_total += $detail->detail_subtotal; // Tambahkan setiap subtotal
        }

        // Buat objek transaksi dengan total dan detail transaksi
        $transaksi = new Transaksi($this->nextId, $user, $transaksi_total, $detail_transaksis);

        foreach ($detail_transaksis as $detail) {
            $barang_id = $detail->barang->barang_id;
            $barang = $this->modelBarang->getBarangById($barang_id);

            if (!$barang) {
                echo "Barang dengan ID " . $barang_id . " tidak ditemukan.<br>";
                continue; // Skip to the next item in the loop if barang is not found
            }

            // Create a new DetailTransaksi object and add it to the transaksi's details
            $detailObj = new DetailTransaksi($transaksi->transaksi_id, $barang, $detail->detail_jumlah, $detail->detail_subtotal);
            $transaksi->detail_transaksi[] = $detailObj;

            // Add this detail to the model's detail transaksi
            $this->modelDetail->addDetailTransaksi($detail->barang->barang_id, $detail->detail_jumlah);
        }

        // Add the transaksi to the model's transaksi list
        $this->modelTransaksi[] = $transaksi;

        // Save the updated transaksi list to the session
        $this->saveToSession();
    }




    public function saveToSession()
    {
        $_SESSION['transaksi'] = serialize($this->modelTransaksi);
    }

    public function getAllTransaksi()
    {
        return $this->modelTransaksi;
    }

    private function getMaxTransaksiId()
    {
        $maxId = 0;
        foreach ($this->modelTransaksi as $transaksi) {
            if ($transaksi->transaksi_id > $maxId) {
                $maxId = $transaksi->transaksi_id;
            }
        }
        return $maxId;
    }
}