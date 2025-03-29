<?php
/* @var $this MasterTindakanController */
/* @var $model MasterTindakan */
?>

<h1>Detail Master Tindakan #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'nama_tindakan',
        'deskripsi',
        'biaya',
        'created_at',
        'updated_at',
    ),
)); ?>

<p>
    <?php echo CHtml::link('Update', array('masterTindakanUpdate', 'id' => $model->id)); ?> |
    <?php echo CHtml::link('Delete', '#', array(
        'submit' => array('masterTindakanDelete', 'id' => $model->id),
        'confirm' => 'Apakah Anda yakin ingin menghapus data ini?'
    )); ?>
</p>
