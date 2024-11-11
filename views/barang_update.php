<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <?php include 'includes/navbar.php'; ?>

    <!-- Main container -->
    <div class="flex">
        <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Formulir Input Role -->
            <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">update barang</h2>
                <form action="index.php?modul=barang&fitur=update" method="POST">
                    <input type="hidden" id="id_barang" name="id_barang" value="<?php echo htmlspecialchars($barang->id_barang); ?>">
                    <!-- Nama Role -->
                    <div class="mb-4">
                        <label for="nama_barang" class="block text-gray-700 text-sm font-bold mb-2">Nama barang:</label>
                        <input type="text" id="nama_barang" name="nama_barang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required value="<?php echo isset($barang->nama_barang) ? htmlspecialchars($barang->nama_barang) : ''; ?>">
                    </div>

                    <!-- Role Deskripsi -->
                    <div class="mb-4 text-left">
                        <label for="harga_barang" class="block text-gray-700 text-sm font-bold mb-2">harga barang:</label>
                        <textarea id="harga_barang" name="harga_barang" class="text-left shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="3" required><?php echo isset($barang->harga_barang) ? htmlspecialchars($barang->harga_barang) : ''; ?></textarea>
                    </div>
                    
                    <!-- Role Status -->
                    <div class="mb-4">
                        <label for="status_barang" class="block text-gray-700 text-sm font-bold mb-2">Status Barang:</label>
                        <select id="status_barang" name="status_barang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <option value="1" <?php echo isset($barang->status_barang) && $barang->status_barang == 1 ? 'selected' : ''; ?>>ada</option>
                            <option value="0" <?php echo isset($barang->status_barang) && $barang->status_barang == 0 ? 'selected' : ''; ?>>tidak ada</option>
                        </select>
                    </div>



                    <div class="mb-4">
                        <label for="stok_barang" class="block text-gray-700 text-sm font-bold mb-2">stok barang:</label>
                        <input id="stok_barang" type = "number" name="stok_barang"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan stok barang"  required value="<?php echo isset($barang->stok_barang) ? htmlspecialchars($barang->stok_barang) : ''; ?>">
                    </div>
                    
                   
                    <!-- Submit Button -->
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
