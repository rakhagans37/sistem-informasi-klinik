<?php
/* @var $this SiteController */
/* @var $model RegisterStaffForm */
/* @var $form CActiveForm */
?>

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Register sebagai Staff</h1>
    <div class="bg-white shadow rounded-lg p-6 ring-1 ring-sky-700">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'register-staff-form',
            'enableAjaxValidation' => false,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        )); ?>

        <p class="text-gray-600 mb-4">Silakan isi form untuk registrasi.</p>

        <?php echo $form->errorSummary($model, null, null, array(
            'class' => 'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4'
        )); ?>

        <div class="mb-4">
            <?php echo $form->labelEx($model, 'fullname', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
            <?php echo $form->textField($model, 'fullname', array(
                'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
                'maxlength' => 50
            )); ?>
            <?php echo $form->error($model, 'fullname', array('class' => 'text-red-500 text-sm')); ?>
        </div>

        <div class="mb-4">
            <?php echo $form->labelEx($model, 'email', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
            <?php echo $form->textField($model, 'email', array(
                'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
                'maxlength' => 100
            )); ?>
            <?php echo $form->error($model, 'email', array('class' => 'text-red-500 text-sm')); ?>
        </div>

        <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <?php echo $form->labelEx($model, 'password', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
                <?php echo $form->passwordField($model, 'password', array(
                    'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline'
                )); ?>
                <?php echo $form->error($model, 'password', array('class' => 'text-red-500 text-sm')); ?>
            </div>
            <div>
                <?php echo $form->labelEx($model, 'confirmPassword', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
                <?php echo $form->passwordField($model, 'confirmPassword', array(
                    'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline'
                )); ?>
                <?php echo $form->error($model, 'confirmPassword', array('class' => 'text-red-500 text-sm')); ?>
            </div>
        </div>

        <!-- Radio button untuk memilih role -->
        <div class="mb-4">
            <?php echo $form->labelEx($model, 'staff_role', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
            <div class="flex items-center space-x-4">
                <?php
                echo $form->radioButtonList($model, 'staff_role', array(
                    'receptionist' => 'Resepsionis',
                    'cashier' => 'Kasir',
                ), array(
                    'separator' => ' ', // pisahkan dengan spasi
                    'labelOptions' => array('class' => 'text-gray-700')
                ));
                ?>
            </div>
            <?php echo $form->error($model, 'staff_role', array('class' => 'text-red-500 text-sm')); ?>
        </div>

        <!-- Field Wilayah -->
        <div class="mb-4">
            <?php echo $form->labelEx($model, 'wilayah_id', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
            <?php echo $form->dropDownList(
                $model,
                'wilayah_id',
                CHtml::listData(MasterWilayah::model()->findAll(), 'id', 'nama'),
                array(
                    'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
                    'prompt' => 'Pilih Wilayah'
                )
            ); ?>
            <?php echo $form->error($model, 'wilayah_id', array('class' => 'text-red-500 text-sm')); ?>
        </div>


        <!-- Field Foto -->
        <div class="mb-4">
            <?php echo $form->labelEx($model, 'photo', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
            <?php echo $form->fileField($model, 'photo', array(
                'class' => 'block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-sky-50 file:text-sky-700 hover:file:bg-sky-100'
            )); ?>
            <?php echo $form->error($model, 'photo', array('class' => 'text-red-500 text-sm')); ?>
        </div>

        <div class="flex items-center justify-end">
            <?php echo CHtml::submitButton('Register', array(
                'class' => 'bg-sky-800 hover:bg-sky-700 text-white font-bold py-2 px-4 rounded'
            )); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div>