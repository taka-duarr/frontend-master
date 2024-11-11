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
                <h2 class="text-2xl font-bold mb-6 text-gray-800">update user</h2>
                <form action="index.php?modul=user&fitur=update" method="POST">
                    <input type="hidden" id="id_user" name="id_user" value="<?php echo htmlspecialchars($user->id_user); ?>">
                    <!-- Nama Role -->
                    <div class="mb-4">
                        <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Nama user:</label>
                        <input type="text" id="username" name="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required value="<?php echo isset($user->username) ? htmlspecialchars($user->username) : ''; ?>">
                    </div>

                    <!-- Role Deskripsi -->
                    <div class="mb-4 text-left">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">password:</label>
                        <textarea id="password" name="password" class="text-left shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="3" required><?php echo isset($user->password) ? htmlspecialchars($user->password) : ''; ?></textarea>
                    </div>
                    
                    <!-- Role Status -->
                    <div class="mb-4">
                        <label for="nama_peran" class="block text-gray-700 text-sm font-bold mb-2">Role Name</label>
                        <select id="nama_peran" name="nama_peran" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required><?php echo isset($user->nama_peran) ? htmlspecialchars($user->nama_peran) : ''; ?>">
                            <option value="">Pilih Status</option>
                            <?php foreach ($roles as $nama_peran){ ?>
                            <option value=<?php echo htmlspecialchars($nama_peran->nama_peran)?>>
                                <?php echo htmlspecialchars($nama_peran->nama_peran)?>
                            </option>
                            <?php } ?>  
                        </select>
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
