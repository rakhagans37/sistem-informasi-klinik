<?php
/* @var $this AdminController */
/* @var $dataProvider CActiveDataProvider */
$data = $dataProvider->getData();
?>

<div class="mb-10 flex flex-col justify-between items-center">
    <h1 class="text-3xl font-bold mb-6">Daftar Karyawan</h1>

    <!-- Berikan arahan bahwa disini anda bisa mengaktifkan dan menonaktifkan pengguna -->

    <div class="mb-6 p-4 bg-gray-100 border border-gray-300 rounded-lg">
        <p class="text-lg text-gray-700">
            Halaman ini diperuntukkan untuk mengaktifkan dan menonaktifkan pengguna, serta untuk merubah data pengguna.
            Silakan klik tombol <strong>Edit</strong> pada masing-masing kartu untuk melihat informasi lengkap dan melakukan perubahan wilayah kerja.
        </p>
    </div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    <?php foreach ($data as $user): ?>
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm py-10 px-2">
            <div class="flex flex-col items-center">
                <?php
                // Tampilkan foto jika tersedia, jika tidak tampilkan placeholder
                $photo = !empty($user->photo)
                    ? Yii::app()->baseUrl . '/assets/uploads/' . $user->photo
                    : 'https://via.placeholder.com/150';
                ?>
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="<?php echo $photo; ?>" alt="<?php echo CHtml::encode($user->fullname); ?>" />
                <h5 class="mb-1 text-xl font-medium text-gray-900"><?php echo CHtml::encode($user->fullname); ?></h5>
                <span class="text-sm text-gray-500"><?php echo CHtml::encode($user->email); ?></span>
                <div class="flex mt-4 md:mt-6 gap-2">
                    <?php
                    $linkLabel = $user->is_active ? 'Unactivate User' : 'Activate User';
                    echo CHtml::link(
                        $linkLabel,
                        array('admin/toggleActivation', 'id' => $user->id),
                        array(
                            'class' => 'inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-sky-700 rounded-lg hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300'
                        )
                    );
                    ?>

                    <?php echo CHtml::link('Edit User', array('admin/userManagementUpdate', 'id' => $user->id), array('class' => 'py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-sky-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700')); ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>