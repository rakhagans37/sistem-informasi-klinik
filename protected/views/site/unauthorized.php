<?php
/* @var $this SiteController */
$this->pageTitle = "Akun Belum Aktif";
?>

<div class="container mx-auto p-6">
    <div class="bg-white shadow rounded-lg p-6 ring-1 ring-sky-700">
        <h1 class="text-3xl font-bold text-center mb-4">Akun Belum Aktif</h1>
        <p class="text-gray-700 text-center mb-6">
            Akun Anda belum aktif. Silakan hubungi admin untuk mengaktifkan akun Anda agar Anda dapat menggunakan semua fitur dalam website ini.
        </p>
        <div class="text-center">
            <?php echo CHtml::link('Hubungi Admin', array('site/contact'), array(
                'class' => 'bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded'
            )); ?>
        </div>
    </div>
</div>