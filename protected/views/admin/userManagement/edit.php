<?php
/* @var $this AdminController */
/* @var $model Users */
/* @var $staffModel Doctors|Recepsionists|Cashiers */
?>

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Edit Detail User - <?php echo CHtml::encode($model->fullname); ?></h1>

    <!-- Tampilkan detail user (read-only) -->
    <div class="bg-white shadow rounded-lg p-6 ring-1 ring-sky-700 mb-6">
        <p class="mb-2"><strong>Email:</strong> <?php echo CHtml::encode($model->email); ?></p>
        <p class="mb-2"><strong>Role:</strong> <?php echo CHtml::encode($model->role->role_name); ?></p>
    </div>

    <!-- Form untuk mengubah wilayah -->
    <?php echo CHtml::form('', 'post', array('id' => 'update-staff-form')); ?>
    <div class="bg-white shadow rounded-lg p-6 ring-1 ring-sky-700">
        <div class="mb-4">
            <?php echo CHtml::label('Wilayah', 'wilayah_id', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
            <?php echo CHtml::dropDownList(
                'Users[wilayah_id]',
                $staffModel->wilayah_id,
                CHtml::listData(MasterWilayah::model()->findAll(), 'id', 'nama'),
                array(
                    'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
                    'prompt' => 'Pilih Wilayah'
                )
            ); ?>
        </div>
        <div class="flex items-center justify-end">
            <?php echo CHtml::submitButton('Update', array(
                'class' => 'bg-sky-800 hover:bg-sky-700 text-white font-bold py-2 px-4 rounded'
            )); ?>
        </div>
    </div>
    <?php echo CHtml::endForm(); ?>
</div>