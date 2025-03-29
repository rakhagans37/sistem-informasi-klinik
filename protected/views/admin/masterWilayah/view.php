<?php
/* @var $this AdminController */
/* @var $model MasterWilayah */
?>

<h1>Detail Master Wilayah #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'nama',
        'alamat',
        'kota',
        'provinsi',
        'kode_pos',
        'telepon',
        'fax',
        'email',
        'website',
        'created_at',
        'updated_at',
    ),
)); ?>

<p>
    <?php echo CHtml::link('Update', array('masterWilayahUpdate', 'id' => $model->id)); ?> |
    <?php echo CHtml::link('Delete', '#', array(
        'submit' => array('masterWilayahDelete', 'id' => $model->id),
        'confirm' => 'Apakah Anda yakin ingin menghapus data ini?'
    )); ?>
</p>