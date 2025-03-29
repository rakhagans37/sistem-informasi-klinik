<?php
/* @var $data MasterWilayah */
?>

<div class="view">
    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('masterWilayahView', 'id'=>$data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
    <?php echo CHtml::encode($data->nama); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('kota')); ?>:</b>
    <?php echo CHtml::encode($data->kota); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('provinsi')); ?>:</b>
    <?php echo CHtml::encode($data->provinsi); ?>
    <br />
</div>
