<?php
/* @var $this AdminController */
?>
<div class="container mx-auto">
    <h1 class="text-2xl font-bold">Dashboard Admin</h1>
    <p class="text-gray-600 mb-6">Selamat datang di dashboard admin. Anda dapat mengelola data rumah sakit, obat, tindakan medis, dan pegawai di sini.</p>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <a href="<?php echo Yii::app()->createUrl('admin/masterWilayahIndex'); ?>" class="block p-6 bg-white rounded-lg ring-1 ring-sky-700 shadow hover:bg-gray-100 transition flex gap-4 flex-col">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 text-sky-950">
                <path d="M19.006 3.705a.75.75 0 1 0-.512-1.41L6 6.838V3a.75.75 0 0 0-.75-.75h-1.5A.75.75 0 0 0 3 3v4.93l-1.006.365a.75.75 0 0 0 .512 1.41l16.5-6Z" />
                <path fill-rule="evenodd" d="M3.019 11.114 18 5.667v3.421l4.006 1.457a.75.75 0 1 1-.512 1.41l-.494-.18v8.475h.75a.75.75 0 0 1 0 1.5H2.25a.75.75 0 0 1 0-1.5H3v-9.129l.019-.007ZM18 20.25v-9.566l1.5.546v9.02H18Zm-9-6a.75.75 0 0 0-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75V15a.75.75 0 0 0-.75-.75H9Z" clip-rule="evenodd" />
            </svg>

            <div>
                <h2 class="text-xl font-semibold">Kelola Data Wilayah</h2>
                <p class="text-gray-600 mt-2">
                    Kelola data wilayah rumah sakit, seperti alamat, kota, provinsi, dan kode pos.
                </p>
            </div>
        </a>
        <a href="<?php echo Yii::app()->createUrl('admin/masterObatIndex'); ?>" class="block p-6 bg-white rounded-lg ring-1 ring-sky-700 shadow hover:bg-gray-100 transition flex gap-4 flex-col">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 text-sky-950">
                <path fill-rule="evenodd" d="M10.5 3.798v5.02a3 3 0 0 1-.879 2.121l-2.377 2.377a9.845 9.845 0 0 1 5.091 1.013 8.315 8.315 0 0 0 5.713.636l.285-.071-3.954-3.955a3 3 0 0 1-.879-2.121v-5.02a23.614 23.614 0 0 0-3 0Zm4.5.138a.75.75 0 0 0 .093-1.495A24.837 24.837 0 0 0 12 2.25a25.048 25.048 0 0 0-3.093.191A.75.75 0 0 0 9 3.936v4.882a1.5 1.5 0 0 1-.44 1.06l-6.293 6.294c-1.62 1.621-.903 4.475 1.471 4.88 2.686.46 5.447.698 8.262.698 2.816 0 5.576-.239 8.262-.697 2.373-.406 3.092-3.26 1.47-4.881L15.44 9.879A1.5 1.5 0 0 1 15 8.818V3.936Z" clip-rule="evenodd" />
            </svg>

            <div>
                <h2 class="text-xl font-semibold">Kelola Data Obat</h2>
                <p class="text-gray-600 mt-2">
                    Kelola data obat yang tersedia di rumah sakit, termasuk nama, jenis, harga, dan expired date.
                </p>
            </div>
        </a>
        <a href="<?php echo Yii::app()->createUrl('admin/masterTindakanIndex'); ?>" class="block p-6 bg-white rounded-lg ring-1 ring-sky-700 shadow hover:bg-gray-100 transition flex gap-4 flex-col">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 text-sky-950">
                <path d="M10.5 1.875a1.125 1.125 0 0 1 2.25 0v8.219c.517.162 1.02.382 1.5.659V3.375a1.125 1.125 0 0 1 2.25 0v10.937a4.505 4.505 0 0 0-3.25 2.373 8.963 8.963 0 0 1 4-.935A.75.75 0 0 0 18 15v-2.266a3.368 3.368 0 0 1 .988-2.37 1.125 1.125 0 0 1 1.591 1.59 1.118 1.118 0 0 0-.329.79v3.006h-.005a6 6 0 0 1-1.752 4.007l-1.736 1.736a6 6 0 0 1-4.242 1.757H10.5a7.5 7.5 0 0 1-7.5-7.5V6.375a1.125 1.125 0 0 1 2.25 0v5.519c.46-.452.965-.832 1.5-1.141V3.375a1.125 1.125 0 0 1 2.25 0v6.526c.495-.1.997-.151 1.5-.151V1.875Z" />
            </svg>

            <div>
                <h2 class="text-xl font-semibold">Kelola Data Tindakan</h2>
                <p class="text-gray-600 mt-2">
                    Kelola data tindakan medis yang tersedia di rumah sakit, termasuk nama, jenis, dan harga.
                </p>
            </div>
        </a>
        <a href="<?php echo Yii::app()->createUrl('admin/userManagementIndex'); ?>" class="block p-6 bg-white rounded-lg ring-1 ring-sky-700 shadow hover:bg-gray-100 transition flex gap-4 flex-col">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 text-sky-950">
                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
            </svg>


            <div>
                <h2 class="text-xl font-semibold">Manajemen Pegawai</h2>
                <p class="text-gray-600 mt-2">
                    Kelola data pegawai rumah sakit, termasuk nama, jabatan, dan informasi kontak.
                </p>
            </div>
        </a>
    </div>
</div>