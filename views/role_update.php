<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Role</title>
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
                <h2 class="text-2xl font-bold mb-6 text-gray-800">update Role</h2>
                <form action="index.php?modul=role&fitur=update" method="POST">
                    <input type="hidden" id="id_peran" name="id_peran" value="<?php echo htmlspecialchars($obj_role->id_peran); ?>">
                    <!-- Nama Role -->
                    <div class="mb-4">
                        <label for="nama_peran" class="block text-gray-700 text-sm font-bold mb-2">Nama Role:</label>
                        <input type="text" id="nama_peran" name="nama_peran" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required value="<?php echo isset($obj_role->nama_peran) ? htmlspecialchars($obj_role->nama_peran) : ''; ?>">
                    </div>

                    <!-- Role Deskripsi -->
                    <div class="mb-4 text-left">
                        <label for="desc_peran" class="block text-gray-700 text-sm font-bold mb-2">Role Deskripsi:</label>
                        <textarea id="desc_peran" name="desc_peran" class="text-left shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="3" required><?php echo isset($obj_role->desc_peran) ? htmlspecialchars($obj_role->desc_peran) : ''; ?></textarea>
                    </div>
                    
                    <!-- Role Status -->
                    <div class="mb-4">
                        <label for="status_peran" class="block text-gray-700 text-sm font-bold mb-2">Role Status:</label>
                        <select id="status_peran" name="status_peran" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <option value="1" <?php echo isset($obj_roles->status_peran) && $obj_roles->status_peran == 1 ? 'selected' : ''; ?>>Aktif</option>
                            <option value="0" <?php echo isset($obj_roles->status_peran) && $obj_roles->status_peran == 0 ? 'selected' : ''; ?>>Tidak Aktif</option>
                        </select>
                    </div>



                    <div class="mb-4">
                        <label for="gaji" class="block text-gray-700 text-sm font-bold mb-2">GAJI:</label>
                        <input id="gaji" type = "number" name="gaji"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan gaji"  required value="<?php echo isset($obj_role->gaji) ? htmlspecialchars($obj_role->gaji) : ''; ?>">
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
