<?php
require_once('domain_object/node_barang.php');

class ModelBarang {
    private $barangs = [];
    private $nextId = 1;

    public function __construct() {
        if (isset($_SESSION['barangs'])) {
            $this->barangs = unserialize($_SESSION['barangs']);
            $this->nextId = count($this->barangs) + 1;
        } else {
            $this->initializeDefaultBarang();
        }
    }

    public function initializeDefaultBarang() {
        $this->addBarang("kayu", 20000, 0, 1000);
        $this->addBarang("kertas", 10000, 1, 1000);
    }

    public function addBarang($nama_barang, $harga_barang, $status_barang, $stok_barang) {
        $barang = new Barang($this->nextId++, $nama_barang, $harga_barang, $status_barang, $stok_barang);
        $this->barangs[] = $barang;
        $this->saveToSession();
    }

    private function saveToSession() {
        $_SESSION['barangs'] = serialize($this->barangs);
    }

    public function getBarangs() {
        return $this->barangs;
    }

    public function getBarangById($id_barang) {
        foreach ($this->barangs as $barang) {
            if ($barang->id_barang == $id_barang) {
                return $barang;
            }
        }
        return null;
    }

    public function updateBarang($id_barang, $nama_barang, $harga_barang, $status_barang, $stok_barang) {
        foreach ($this->barangs as $barang) {
            if ($barang->id_barang == $id_barang) {
                $barang->nama_barang = $nama_barang;
                $barang->harga_barang = $harga_barang;
                $barang->status_barang = $status_barang;
                $barang->stok_barang = $stok_barang;
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function deleteBarang($id_barang) {
        foreach ($this->barangs as $key => $barang) {
            if ($barang->id_barang == $id_barang) {
                unset($this->barangs[$key]);
                $this->barangs = array_values($this->barangs);
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function getBarangByName($nama_barang) {
        foreach ($this->barangs as $barang) {
            if ($barang->nama_barang == $nama_barang) {
                return $barang;
            }
        }
        return null;
    }
}
?>
