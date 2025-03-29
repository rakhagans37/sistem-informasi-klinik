<?php
/* @var $this AdminController */
/* @var $model MasterWilayah */
/* @var $form CActiveForm */
?>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Update Master Wilayah #<?php echo $model->id; ?></h1>

    <div class="bg-white shadow rounded-lg p-6 ring-1 ring-sky-700">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'master-wilayah-form',
            'enableAjaxValidation' => false,
        )); ?>

        <p class="text-gray-600 mb-4">Kolom dengan tanda <span class="text-red-500">*</span> wajib diisi.</p>

        <?php echo $form->errorSummary($model, null, null, array('class' => 'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4')); ?>

        <!-- Nama -->
        <div class="mb-4">
            <?php echo $form->labelEx($model, 'nama', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
            <?php echo $form->textField($model, 'nama', array(
                'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
                'maxlength' => 100
            )); ?>
            <?php echo $form->error($model, 'nama', array('class' => 'text-red-500 text-sm')); ?>
        </div>

        <!-- Alamat -->
        <div class="mb-4">
            <?php echo $form->labelEx($model, 'alamat', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
            <?php echo $form->textArea($model, 'alamat', array(
                'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
                'rows' => 4
            )); ?>
            <?php echo $form->error($model, 'alamat', array('class' => 'text-red-500 text-sm')); ?>
        </div>

        <!-- Kota & Provinsi -->
        <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <?php echo $form->labelEx($model, 'kota', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
                <?php echo $form->textField($model, 'kota', array(
                    'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
                    'maxlength' => 100
                )); ?>
                <?php echo $form->error($model, 'kota', array('class' => 'text-red-500 text-sm')); ?>
            </div>
            <div>
                <?php echo $form->labelEx($model, 'provinsi', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
                <?php echo $form->textField($model, 'provinsi', array(
                    'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
                    'maxlength' => 100
                )); ?>
                <?php echo $form->error($model, 'provinsi', array('class' => 'text-red-500 text-sm')); ?>
            </div>
        </div>

        <!-- Kode Pos & Telepon -->
        <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <?php echo $form->labelEx($model, 'kode_pos', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
                <?php echo $form->textField($model, 'kode_pos', array(
                    'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
                    'maxlength' => 10
                )); ?>
                <?php echo $form->error($model, 'kode_pos', array('class' => 'text-red-500 text-sm')); ?>
            </div>
            <div>
                <?php echo $form->labelEx($model, 'telepon', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
                <?php echo $form->textField($model, 'telepon', array(
                    'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
                    'maxlength' => 20
                )); ?>
                <?php echo $form->error($model, 'telepon', array('class' => 'text-red-500 text-sm')); ?>
            </div>
        </div>

        <!-- Fax & Email -->
        <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <?php echo $form->labelEx($model, 'fax', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
                <?php echo $form->textField($model, 'fax', array(
                    'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
                    'maxlength' => 20
                )); ?>
                <?php echo $form->error($model, 'fax', array('class' => 'text-red-500 text-sm')); ?>
            </div>
            <div>
                <?php echo $form->labelEx($model, 'email', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
                <?php echo $form->textField($model, 'email', array(
                    'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
                    'maxlength' => 100
                )); ?>
                <?php echo $form->error($model, 'email', array('class' => 'text-red-500 text-sm')); ?>
            </div>
        </div>

        <!-- Website -->
        <div class="mb-4">
            <?php echo $form->labelEx($model, 'website', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
            <?php echo $form->textField($model, 'website', array(
                'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
                'maxlength' => 100
            )); ?>
            <?php echo $form->error($model, 'website', array('class' => 'text-red-500 text-sm')); ?>
        </div>

        <div class="flex items-center justify-end">
            <?php echo CHtml::submitButton('Update', array('class' => 'bg-sky-800 hover:bg-sky-700 text-white font-bold py-2 px-4 rounded')); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div>