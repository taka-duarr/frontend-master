<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama User</title>
<!--    <link href="./Views/output.css" rel="stylesheet">-->
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
            <!-- Your main content goes here -->
            <div class="container mx-auto">
                <!-- Button to Insert New Role -->
                <div class="mb-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <a href="MainEntryPoint.php?modul=user&fitur=add">Insert New User</a>
                    </button>
                </div>

                <!-- Roles Table -->
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-full bg-white grid-cols-1">
                        <thead class="bg-gray-800 text-white">

                        <tr>
                            <th class="w-1/12 py-3 px-4 uppercase font-semibold text-sm">User ID</th>
                            <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">User Name</th>
                            <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm">Username</th>
                            <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Role Name</th>
                            <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                        </tr>

                        </thead>
                        <tbody class="text-gray-700">
                        <!-- Example Data Row -->
                        <?php if (!empty($users)){
                            foreach ($users as $user){?>
                        <tr class="text-center">
                            <td class="py-3 px-4 text-blue-600">
                                <?php echo htmlspecialchars($user->userId); ?>
                            </td>
                            <td class="w-1/4 py-3 px-4">
                                <?php echo htmlspecialchars($user->name); ?>
                            </td>
                            <td class="w-1/3 py-3 px-4">
                                <?php echo htmlspecialchars($user->username); ?>
                            </td>
                             <td class="w-1/3 py-3 px-4">
                                <?php echo htmlspecialchars($user->role->role_name); ?>
                            </td>
                            <td class="w-1/6 py-3 px-4">
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded mr-2">
                                    <a href="MainEntryPoint.php?modul=role&fitur=edit&id=<?php echo htmlspecialchars($user->userId); ?>">
                                        Update
                                    </a>
                                </button>
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                    <a href="MainEntryPoint.php?modul=role&fitur=delete&id=<?php echo htmlspecialchars($user->userId); ?>">
                                        Delete
                                    </a>
                                </button>
                            </td>
                        </tr>
                                <?php
                            }
                        } ?>
                        <!-- More rows can be added dynamically here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
