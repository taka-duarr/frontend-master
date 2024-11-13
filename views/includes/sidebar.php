<div class="w-64 bg-gray-800 text-gray-100 h-screen">
    <div class="p-4 font-bold text-lg">Menu</div>
    <ul class="mt-4 space-y-2">

        <?php if ($_SESSION['username_login']->role->nama_peran == 'super admin'): ?>
            <!-- Menu untuk Super Admin -->
            <li class="group">
                <a href="index.php?modul=role">
                    <div class="px-4 py-2 hover:bg-gray-700 cursor-pointer group-hover:bg-gray-700">Master Data Role</div>
                </a>
            </li>
            <li class="group">
                <div class="px-4 py-2 hover:bg-gray-700 cursor-pointer group-hover:bg-gray-700">
                    <a href="index.php?modul=user">Master Data User</a>
                </div>
            </li>
            <li class="group">
                <a href="index.php?modul=barang">
                    <div class="px-4 py-2 hover:bg-gray-700 cursor-pointer group-hover:bg-gray-700">Master Data Barang</div>
                </a>
            </li>
            <li class="group">
                <div class="px-4 py-2 hover:bg-gray-700 cursor-pointer group-hover:bg-gray-700">Menu Transaksi</div>
                <ul class="ml-4 space-y-1 hidden group-hover:block">
                    <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                        <a href="index.php?modul=transaksi&fitur=input">Insert Transaksi</a>
                    </li>
                    <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                        <a href="index.php?modul=transaksi&fitur=list">List Transaksi</a>
                    </li>
                </ul>
            </li>
        <?php elseif ($_SESSION['username_login']->role->nama_peran == 'admin'): ?>
            <!-- Menu untuk Admin -->
            <li class="group">
                <div class="px-4 py-2 hover:bg-gray-700 cursor-pointer group-hover:bg-gray-700">
                    <a href="index.php?modul=user">Master Data User</a>
                </div>
            </li>
            <li class="group">
                <a href="index.php?modul=barang">
                    <div class="px-4 py-2 hover:bg-gray-700 cursor-pointer group-hover:bg-gray-700">Master Data Barang</div>
                </a>
            </li>
        <?php elseif ($_SESSION['username_login']->role->nama_peran == 'kasir'): ?>
            <!-- Menu untuk Transaksi -->
            <li class="group">
                <div class="px-4 py-2 hover:bg-gray-700 cursor-pointer group-hover:bg-gray-700">Menu Transaksi</div>
                <ul class="ml-4 space-y-1 hidden group-hover:block">
                    <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                        <a href="index.php?modul=transaksi&fitur=input">Insert Transaksi</a>
                    </li>
                    <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                        <a href="index.php?modul=transaksi&fitur=list">List Transaksi</a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>
        
    </ul>
</div>
