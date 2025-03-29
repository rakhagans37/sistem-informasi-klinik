<?php
/* @var $data Appointments */
$pasien = $data->pasien; // asumsikan relasi sudah ada
?>

<div class="p-4 border-b flex justify-between items-center">
    <div>
        <p class="font-bold"><?php echo CHtml::encode($pasien->nama); ?></p>
        <p class="text-gray-600"><?php echo CHtml::encode($data->created_at); ?></p>
    </div>
    <div>
        <?php echo CHtml::link('Detail', array('doctor/detail', 'id'=>$data->id), array('class'=>'bg-blue-700 hover:bg-blue-800 text-white py-2 px-4 rounded')); ?>
    </div>
</div>
