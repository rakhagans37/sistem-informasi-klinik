<?php
/* @var $this DoctorController */
/* @var $appointment Appointments */
/* @var $treatmentModel TransaksiTindakan */
?>
<?php if (Yii::app()->user->hasFlash('success')): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

<?php if (Yii::app()->user->hasFlash('error')): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <?php print_r(Yii::app()->user->getFlash('error')); ?>
    </div>
<?php endif; ?>

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Berikan Tindakan untuk <?php echo CHtml::encode($appointment->pasien->nama); ?></h1>

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'treatment-form',
        'enableAjaxValidation' => false,
    )); ?>

    <div class="mb-6">
        <?php echo $form->labelEx($treatmentModel, 'tindakan_id', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
        <?php echo $form->dropDownList(
            $treatmentModel,
            'tindakan_id',
            CHtml::listData(MasterTindakan::model()->findAll(), 'id', 'nama_tindakan'),
            array(
                'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
                'prompt' => 'Pilih tindakan'
            )
        ); ?>
        <?php echo $form->error($treatmentModel, 'tindakan_id', array('class' => 'text-red-500 text-sm')); ?>
    </div>

    <div class="mb-6">
        <?php echo $form->labelEx($treatmentModel, 'catatan', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
        <?php echo $form->textArea($treatmentModel, 'catatan', array(
            'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
            'rows' => 3
        )); ?>
        <?php echo $form->error($treatmentModel, 'catatan', array('class' => 'text-red-500 text-sm')); ?>
    </div>

    <div class="flex items-center justify-end">
        <?php echo CHtml::submitButton('Simpan Tindakan', array(
            'class' => 'bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded'
        )); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>