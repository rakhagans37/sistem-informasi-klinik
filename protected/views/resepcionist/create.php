<?php
/* @var $this AppointmentController */
/* @var $model Appointments */
/* @var $patientModel Pasien */
/* @var $form CActiveForm */
?>
<?php if (Yii::app()->user->hasFlash('success')): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

<?php if (Yii::app()->user->hasFlash('error')): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <?php echo Yii::app()->user->getFlash('error'); ?>
    </div>
<?php endif; ?>

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Buat Appointment</h1>

    <p class="text-gray-600 mb-4">
        Pilih apakah Anda ingin menggunakan data pasien yang sudah ada atau membuat data pasien baru.
    </p>

    <!-- Pilihan Opsi Pasien -->
    <div class="mb-6">
        <?php echo CHtml::radioButtonList('patientOption', 'existing', array(
            'existing' => 'Pasien yang sudah ada',
            'new'      => 'Buat data pasien baru',
        ), array(
            'separator' => ' ',
            'labelOptions' => array('class' => 'text-gray-700 font-bold'),
            'onclick' => 'togglePatientOption(this.value)'
        )); ?>
    </div>

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'appointment-form',
        'enableAjaxValidation' => false,
        // Form untuk appointment saja, tidak perlu enctype jika tidak ada file upload di sini
    )); ?>

    <!-- Section: Masukkan Nomor Registrasi Pasien -->
    <div id="existingPatient" class="mb-6">
        <?php echo CHtml::label('Nomor Registrasi Pasien', 'Appointments[nomor_registrasi]', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
        <?php echo CHtml::textField('Appointments[nomor_registrasi]', '', array(
            'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
            'placeholder' => 'Masukkan nomor registrasi pasien'
        )); ?>
    </div>


    <!-- Section: Data Pasien Baru -->
    <div id="newPatient" class="mb-6 hidden">
        <h2 class="text-2xl font-bold mb-4">Data Pasien Baru</h2>
        <div class="mb-4">
            <?php echo CHtml::label('Nama', 'Pasien[nama]', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
            <?php echo CHtml::textField('Pasien[nama]', '', array(
                'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline'
            )); ?>
        </div>
        <div class="mb-4">
            <?php echo CHtml::label('Alamat', 'Pasien[alamat]', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
            <?php echo CHtml::textArea('Pasien[alamat]', '', array(
                'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
                'rows' => 3
            )); ?>
        </div>
        <div class="mb-4">
            <?php echo CHtml::label('Telepon', 'Pasien[telepon]', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
            <?php echo CHtml::textField('Pasien[telepon]', '', array(
                'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline'
            )); ?>
        </div>
        <div class="mb-4">
            <?php echo CHtml::label('Email', 'Pasien[email]', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
            <?php echo CHtml::textField('Pasien[email]', '', array(
                'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline'
            )); ?>
        </div>
    </div>

    <!-- Field Appointment Lainnya -->
    <div class="mb-6">
        <?php echo CHtml::label('Pilih Dokter', 'Appointments[doctor_id]', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
        <?php echo CHtml::dropDownList(
            'Appointments[doctor_id]',
            '',
            CHtml::listData(Doctors::model()->findAll(), 'id', 'user.fullname'),
            array(
                'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
                'prompt' => 'Pilih dokter'
            )
        ); ?>
    </div>

    <div class="mb-6">
        <?php echo CHtml::label('Catatan', 'Appointments[notes]', array('class' => 'block text-gray-700 font-bold mb-2')); ?>
        <?php echo CHtml::textArea('Appointments[notes]', '', array(
            'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline',
            'rows' => 3
        )); ?>
    </div>

    <div class="flex items-center justify-end">
        <?php echo CHtml::submitButton('Buat Appointment', array(
            'class' => 'bg-sky-800 hover:bg-sky-700 text-white font-bold py-2 px-4 rounded'
        )); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>

<script>
    function togglePatientOption(value) {
        // Seluruh input di reset kosong
        document.getElementById('existingPatient').querySelectorAll('input[type="text"], textarea').forEach(function(input) {
            input.value = '';
        });
        // Seluruh input di reset kosong
        document.getElementById('newPatient').querySelectorAll('input[type="text"], textarea').forEach(function(input) {
            input.value = '';
        });
        if (value === 'existing') {
            document.getElementById('existingPatient').classList.remove('hidden');
            document.getElementById('newPatient').classList.add('hidden');
        } else if (value === 'new') {
            document.getElementById('existingPatient').classList.add('hidden');
            document.getElementById('newPatient').classList.remove('hidden');
        }
    }
</script>