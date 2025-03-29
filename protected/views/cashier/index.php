<?php
/* @var $this CashierController */
/* @var $dataProvider CSqlDataProvider */
/* @var $search string */
?>

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Daftar Transaksi Pasien</h1>

    <!-- Form Pencarian -->
    <div class="mb-6">
        <?php echo CHtml::form('', 'get', array('class' => 'mb-4')); ?>
        <div class="flex space-x-4">
            <input type="text" name="nomor_registrasi" value="<?php echo CHtml::encode($search); ?>" placeholder="Cari berdasarkan nomor registrasi" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline">
            <button type="submit" class="bg-sky-700 hover:bg-sky-800 text-white font-bold py-2 px-4 rounded">Cari</button>
        </div>
        <?php echo CHtml::endForm(); ?>
    </div>

    <!-- Tampilkan data pasien dalam bentuk tabel -->
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'patient-outstanding-grid',
        'dataProvider' => $dataProvider,
        'columns' => array(
            array(
                'name' => 'nomor_registrasi',
                'header' => 'Nomor Registrasi',
                'headerHtmlOptions' => array('class' => 'px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'),
                'htmlOptions' => array('class' => 'px-6 py-4 whitespace-nowrap'),
            ),
            array(
                'name' => 'nama',
                'header' => 'Nama',
                'headerHtmlOptions' => array('class' => 'px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'),
                'htmlOptions' => array('class' => 'px-6 py-4 whitespace-nowrap'),
            ),
            array(
                'header' => 'Total Tindakan',
                'value' => 'number_format($data["total_tindakan"], 2, ",", ".")',
                'headerHtmlOptions' => array('class' => 'px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'),
                'htmlOptions' => array('class' => 'px-6 py-4 whitespace-nowrap text-sm text-gray-900'),
            ),
            array(
                'header' => 'Total Obat',
                'value' => 'number_format($data["total_obat"], 2, ",", ".")',
                'headerHtmlOptions' => array('class' => 'px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'),
                'htmlOptions' => array('class' => 'px-6 py-4 whitespace-nowrap text-sm text-gray-900'),
            ),
            array(
                'header' => 'Total Outstanding',
                'value' => 'number_format($data["total_outstanding"], 2, ",", ".")',
                'headerHtmlOptions' => array('class' => 'px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'),
                'htmlOptions' => array('class' => 'px-6 py-4 whitespace-nowrap text-sm text-gray-900'),
            ),
            array(
                'class' => 'CButtonColumn',
                'template' => '{view}',
                'buttons' => array(
                    'view' => array(
                        'label' => 'Detail',
                        'url' => 'Yii::app()->createUrl("cashier/view", array("id"=>$data["id"]))',
                        'options' => array('class' => 'bg-blue-700 hover:bg-blue-800 text-white py-1 px-2 rounded'),
                    ),
                ),
                'headerHtmlOptions' => array('class' => 'px-6 py-3 bg-gray-50'),
                'htmlOptions' => array('class' => 'px-6 py-4 whitespace-nowrap text-right text-sm font-medium'),
            ),
        ),
        'itemsCssClass' => 'min-w-full divide-y divide-gray-200',
        'summaryCssClass' => 'text-sm text-gray-500 mb-4',
        'pagerCssClass' => 'mt-4',
        'htmlOptions' => array('class' => 'shadow-md rounded-lg overflow-hidden'),
    )); ?>
</div>