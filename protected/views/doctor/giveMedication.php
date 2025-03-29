<?php
/* @var $this DoctorController */
/* @var $appointment Appointments */
/* @var $medicationModel TransaksiObatPasien */
?>

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Berikan Obat untuk <?php echo CHtml::encode($appointment->pasien->nama); ?></h1>

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'medication-form',
        'enableAjaxValidation' => false,
    )); ?>

    <div class="mb-6">
        <?php echo $form->labelEx($medicationModel, 'obat_id', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
        <?php echo $form->dropDownList(
            $medicationModel,
            'obat_id',
            CHtml::listData(MasterObat::model()->findAll(), 'id', 'nama_obat'),
            array(
                'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
                'prompt' => 'Pilih obat'
            )
        ); ?>
        <?php echo $form->error($medicationModel, 'obat_id', array('class' => 'text-red-500 text-sm')); ?>
    </div>

    <div class="mb-6">
        <?php echo $form->labelEx($medicationModel, 'jumlah', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
        <?php echo $form->textField($medicationModel, 'jumlah', array(
            'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
        )); ?>
        <?php echo $form->error($medicationModel, 'jumlah', array('class' => 'text-red-500 text-sm')); ?>
    </div>

    <div class="mb-6">
        <?php echo $form->labelEx($medicationModel, 'dosis', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
        <?php echo $form->textField($medicationModel, 'dosis', array(
            'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
        )); ?>
        <?php echo $form->error($medicationModel, 'dosis', array('class' => 'text-red-500 text-sm')); ?>
    </div>

    <div class="mb-6">
        <?php echo $form->labelEx($medicationModel, 'catatan', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
        <?php echo $form->textArea($medicationModel, 'catatan', array(
            'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
            'rows' => 3,
        )); ?>
        <?php echo $form->error($medicationModel, 'catatan', array('class' => 'text-red-500 text-sm')); ?>
    </div>

    <div class="flex items-center justify-end">
        <?php echo CHtml::submitButton('Simpan Obat', array(
            'class' => 'bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded'
        )); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>