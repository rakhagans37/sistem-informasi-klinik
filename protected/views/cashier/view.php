<?php
/* @var $this CashierController */
/* @var $patientData array */
?>

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Detail Pembayaran Pasien</h1>

    <div class="bg-white shadow rounded-lg p-6 mb-6 ring-1 ring-sky-700">
        <p><strong>Nomor Registrasi:</strong> <?php echo CHtml::encode($patientData['nomor_registrasi']); ?></p>
        <p><strong>Nama:</strong> <?php echo CHtml::encode($patientData['nama']); ?></p>
        <p><strong>Total Tindakan:</strong> <?php echo number_format($patientData['total_tindakan'], 2, ',', '.'); ?></p>
        <p><strong>Total Obat:</strong> <?php echo number_format($patientData['total_obat'], 2, ',', '.'); ?></p>
        <p><strong>Total Outstanding:</strong> <?php echo number_format($patientData['total_outstanding'], 2, ',', '.'); ?></p>
    </div>

    <div class="flex items-center justify-end">
        <?php echo CHtml::link('Konfirmasi Pembayaran', array('cashier/confirmPayment', 'id' => $patientData['id']), array(
            'class' => 'bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded'
        )); ?>
    </div>
</div>