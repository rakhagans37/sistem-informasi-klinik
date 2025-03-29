<?php
/* @var $this AdminController */
/* @var $model MasterObat */
?>

<h1>Detail Master Obat #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'nama_obat',
        'deskripsi',
        'jenis',
        'harga',
        'satuan',
        'expired_date',
        'created_at',
        'updated_at',
    ),
)); ?>

<p>
    <?php echo CHtml::link('Update', array('masterObatUpdate', 'id' => $model->id)); ?> |
    <?php echo CHtml::link('Delete', '#', array(
        'submit' => array('masterObatDelete', 'id' => $model->id),
        'confirm' => 'Apakah Anda yakin ingin menghapus data ini?'
    )); ?>
</p>
