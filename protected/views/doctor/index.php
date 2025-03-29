<?php
/* @var $this DoctorController */
/* @var $dataProvider CActiveDataProvider */
?>

<h1 class="text-3xl font-bold mb-6">Daftar Pasien Pending</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_item',  // buat file partial _item.php
)); ?>
