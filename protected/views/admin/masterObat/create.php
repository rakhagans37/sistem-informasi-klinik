<?php
/* @var $this AdminController */
/* @var $model MasterObat */
/* @var $form CActiveForm */
?>

<div class="container mx-auto p-6">
  <h1 class="text-2xl font-bold mb-6">Buat Master Obat Baru</h1>

  <div class="bg-white shadow rounded-lg p-6 ring-1 ring-sky-700">
    <?php $form = $this->beginWidget('CActiveForm', array(
      'id' => 'master-obat-form',
      'enableAjaxValidation' => false,
    )); ?>

      <p class="text-gray-600 mb-4">
        Kolom dengan tanda <span class="text-red-500">*</span> wajib diisi.
      </p>

      <?php echo $form->errorSummary($model, null, null, array('class'=>'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4')); ?>

      <!-- Nama Obat -->
      <div class="mb-4">
        <?php echo $form->labelEx($model, 'nama_obat', array('class'=>'block text-gray-700 font-bold mb-2')); ?>
        <?php echo $form->textField($model, 'nama_obat', array(
          'class'=>'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
          'maxlength'=>100
        )); ?>
        <?php echo $form->error($model, 'nama_obat', array('class'=>'text-red-500 text-sm')); ?>
      </div>

      <!-- Deskripsi -->
      <div class="mb-4">
        <?php echo $form->labelEx($model, 'deskripsi', array('class'=>'block text-gray-700 font-bold mb-2')); ?>
        <?php echo $form->textArea($model, 'deskripsi', array(
          'class'=>'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
          'rows'=>4
        )); ?>
        <?php echo $form->error($model, 'deskripsi', array('class'=>'text-red-500 text-sm')); ?>
      </div>

      <!-- Jenis & Satuan -->
      <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <?php echo $form->labelEx($model, 'jenis', array('class'=>'block text-gray-700 font-bold mb-2')); ?>
          <?php echo $form->textField($model, 'jenis', array(
            'class'=>'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
            'maxlength'=>50
          )); ?>
          <?php echo $form->error($model, 'jenis', array('class'=>'text-red-500 text-sm')); ?>
        </div>
        <div>
          <?php echo $form->labelEx($model, 'satuan', array('class'=>'block text-gray-700 font-bold mb-2')); ?>
          <?php echo $form->textField($model, 'satuan', array(
            'class'=>'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
            'maxlength'=>20
          )); ?>
          <?php echo $form->error($model, 'satuan', array('class'=>'text-red-500 text-sm')); ?>
        </div>
      </div>

      <!-- Harga -->
      <div class="mb-4">
        <?php echo $form->labelEx($model, 'harga', array('class'=>'block text-gray-700 font-bold mb-2')); ?>
        <?php echo $form->textField($model, 'harga', array(
          'class'=>'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline'
        )); ?>
        <?php echo $form->error($model, 'harga', array('class'=>'text-red-500 text-sm')); ?>
      </div>

      <!-- Expired Date -->
      <div class="mb-4">
        <?php echo $form->labelEx($model, 'expired_date', array('class'=>'block text-gray-700 font-bold mb-2')); ?>
        <?php echo $form->textField($model, 'expired_date', array(
          'class'=>'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
          'placeholder'=>'YYYY-MM-DD'
        )); ?>
        <?php echo $form->error($model, 'expired_date', array('class'=>'text-red-500 text-sm')); ?>
      </div>

      <div class="flex items-center justify-end">
        <?php echo CHtml::submitButton('Create', array('class'=>'bg-sky-800 hover:bg-sky-700 text-white font-bold py-2 px-4 rounded')); ?>
      </div>

    <?php $this->endWidget(); ?>
  </div>
</div>
