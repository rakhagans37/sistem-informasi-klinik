<?php
/* @var $this AdminController */
/* @var $model MasterTindakan */
/* @var $form CActiveForm */
?>

<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Update Master Tindakan #<?php echo $model->id; ?></h1>

    <div class="bg-white shadow rounded-lg p-6 ring-1 ring-sky-700">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'master-tindakan-form',
            'enableAjaxValidation' => false,
        )); ?>

        <p class="text-gray-600 mb-4">
            Kolom dengan tanda <span class="text-red-500">*</span> wajib diisi.
        </p>

        <?php echo $form->errorSummary($model, null, null, array('class' => 'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4')); ?>

        <!-- Nama Tindakan -->
        <div class="mb-4">
            <?php echo $form->labelEx($model, 'nama_tindakan', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
            <?php echo $form->textField($model, 'nama_tindakan', array(
                'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
                'maxlength' => 100
            )); ?>
            <?php echo $form->error($model, 'nama_tindakan', array('class' => 'text-red-500 text-sm')); ?>
        </div>

        <!-- Deskripsi -->
        <div class="mb-4">
            <?php echo $form->labelEx($model, 'deskripsi', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
            <?php echo $form->textArea($model, 'deskripsi', array(
                'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
                'rows' => 4
            )); ?>
            <?php echo $form->error($model, 'deskripsi', array('class' => 'text-red-500 text-sm')); ?>
        </div>

        <!-- Biaya -->
        <div class="mb-4">
            <?php echo $form->labelEx($model, 'biaya', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
            <?php echo $form->textField($model, 'biaya', array(
                'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline'
            )); ?>
            <?php echo $form->error($model, 'biaya', array('class' => 'text-red-500 text-sm')); ?>
        </div>

        <div class="flex items-center justify-end">
            <?php echo CHtml::submitButton('Update', array('class' => 'bg-sky-800 hover:bg-sky-700 text-white font-bold py-2 px-4 rounded')); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div>