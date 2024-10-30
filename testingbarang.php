<?php
session_start();
session_destroy();
require_once 'model/model_barang.php';

// create model dan view all
$obj_item = new ModelBarang();
// $obj_item->addBarang("kasir", "kasir", 1, 20000);
// $obj_item->addBarang("admin", "admin", 1, 20000);
// $obj_item->addBarang("manager", "manager", 0, 70000);

foreach ($obj_item->getBarangs() as $item){
    echo "ID Item: " . $item->id_barang . "<br>";
    echo "Item Name: " . $item->nama_barang . "<br>";
    echo "Item Description: " . $item->harga_barang . "<br>";
    echo "Item Status: " . $item->status_barang . "<br>";
    echo "Item Quantity: " . $item->stok_barang . "<br><hr>";
}

// Add new item
if (isset($_POST['submit_role'])) {
    $obj_item->addBarang($_POST['nama_barang'], $_POST['harga_barang'], $_POST['status_barang'], $_POST['stok_barang']);
}

// Display new items
echo "========Add Data Item=============" . "<br>";
$obj_item = new ModelBarang();
foreach ($obj_item->getbarangs() as $item) {
    echo "ID Item: " . $item->id_barang . "<br>";
    echo "Item Name: " . $item->nama_barang . "<br>";
    echo "Item Description: " . $item->harga_barang . "<br>";
    echo "Item Status: " . $item->status_barang . "<br>";
    echo "Item Quantity: " . $item->stok_barang . "<br><hr>";
}

// Testing items
echo "==================Testing Items=================" . "<br>";
$obj_item->addBarang("new item", "new item", 1, 10000);
foreach ($obj_item->getbarangs() as $item) {
    echo "ID Item: " . $item->id_barang . "<br>";
    echo "Item Name: " . $item->nama_barang . "<br>";
    echo "Item Description: " . $item->harga_barang . "<br>";
    echo "Item Status: " . $item->status_barang . "<br>";
    echo "Item Quantity: " . $item->stok_barang . "<br><hr>";
}

// Default data items
echo "========Default Data Items=============" . "<br>";
$obj_item = new ModelBarang();
foreach ($obj_item->getbarangs() as $item) {
    echo "ID Item: " . $item->id_barang . "<br>";
    echo "Item Name: " . $item->nama_barang . "<br>";
    echo "Item Description: " . $item->harga_barang . "<br>";
    echo "Item Status: " . $item->status_barang . "<br>";
    echo "Item Quantity: " . $item->stok_barang . "<br><hr>";
}

// Update items
echo "===============Update Data Items================" . "<br>";
$obj_item->updatebarang(1, "updated item", "updated item description", 1, 15000);
foreach ($obj_item->getbarangs() as $item) {
    echo "ID Item: " . $item->id_barang . "<br>";
    echo "Item Name: " . $item->nama_barang . "<br>";
    echo "Item Description: " . $item->harga_barang . "<br>";
    echo "Item Status: " . $item->status_barang . "<br>";
    echo "Item Quantity: " . $item->stok_barang . "<br><hr>";
}

// Delete items
echo "===============Delete Data Items================" . "<br>";
$obj_item->deletebarang(1);
foreach ($obj_item->getbarangs() as $item) {
    echo "ID Item: " . $item->id_barang . "<br>";
    echo "Item Name: " . $item->nama_barang . "<br>";
    echo "Item Description: " . $item->harga_barang . "<br>";
    echo "Item Status: " . $item->status_barang . "<br>";
    echo "Item Quantity: " . $item->stok_barang . "<br><hr>";
}
?>
