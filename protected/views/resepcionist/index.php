<?php
/* @var $this AdminController */
/* @var $dataProvider CActiveDataProvider */
?>

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Administrasi Klinik</h1>

    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'appointments-grid',
        'dataProvider' => $dataProvider,
        'itemsCssClass' => 'min-w-full divide-y divide-gray-200',
        'htmlOptions' => array('class' => 'shadow-md rounded-lg overflow-hidden'),
        'columns' => array(
            'id',
            array(
                'header' => 'Pasien',
                'value' => '$data->pasien->nama', // pastikan field "nama" ada di model Pasien
            ),
            array(
                'header' => 'Dokter',
                'value' => '$data->doctor->user->fullname', // ambil fullname dari relasi doctor->user
            ),
            'status',
            array(
                'header' => 'Catatan',
                'value' => '$data->notes',
            ),
            'created_at',
            array(
                'class' => 'CButtonColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => array(
                    'view' => array(
                        'label' => 'View',
                        'url' => 'Yii::app()->createUrl("admin/appointmentsView", array("id"=>$data->id))',
                    ),
                    'update' => array(
                        'label' => 'Update',
                        'url' => 'Yii::app()->createUrl("admin/appointmentsUpdate", array("id"=>$data->id))',
                    ),
                    'delete' => array(
                        'label' => 'Delete',
                        'url' => 'Yii::app()->createUrl("admin/appointmentsDelete", array("id"=>$data->id))',
                    ),
                ),
            ),
        ),
    )); ?>
</div>