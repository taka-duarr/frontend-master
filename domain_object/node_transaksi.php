<?php

require_once 'node_detail_transaksi.php';

class transaksi{
    public $transaksi_id;
    public $user;
    public $transaksi_total;
    public $detail_transaksi;

    public function __construct($transaksi_id, $user, $transaksi_total, $detail_transaksi) {
        $this->transaksi_id = $transaksi_id;
        $this->user = $user;
        $this->transaksi_total = $transaksi_total;
        $this->detail_transaksi = $detail_transaksi;
    }
}

?>