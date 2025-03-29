<?php
/* @var $this DoctorController */
/* @var $model Appointments */
$pasien = $model->pasien;
?>

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Detail Appointment</h1>

    <!-- Informasi Pasien -->
    <div class="bg-white shadow rounded-lg p-6 mb-6 ring-1 ring-sky-700">
        <h2 class="text-2xl font-bold mb-4">Informasi Pasien</h2>
        <p><strong>Nama:</strong> <?php echo CHtml::encode($pasien->nama); ?></p>
        <p><strong>Nomor Registrasi:</strong> <?php echo CHtml::encode($pasien->nomor_registrasi); ?></p>
        <p><strong>Alamat:</strong> <?php echo CHtml::encode($pasien->alamat); ?></p>
        <p><strong>Telepon:</strong> <?php echo CHtml::encode($pasien->telepon); ?></p>
        <p><strong>Email:</strong> <?php echo CHtml::encode($pasien->email); ?></p>
    </div>

    <!-- Informasi Appointment -->
    <div class="bg-white shadow rounded-lg p-6 mb-6 ring-1 ring-sky-700">
        <h2 class="text-2xl font-bold mb-4">Data Appointment</h2>
        <p><strong>Status:</strong> <?php echo CHtml::encode($model->status); ?></p>
        <p><strong>Catatan:</strong> <?php echo CHtml::encode($model->notes); ?></p>
        <p><strong>Dibuat:</strong> <?php echo CHtml::encode($model->created_at); ?></p>
    </div>

    <!-- Transaksi Tindakan -->
    <div class="bg-white shadow rounded-lg p-6 mb-6 ring-1 ring-sky-700">
        <h2 class="text-2xl font-bold mb-4">Transaksi Tindakan</h2>
        <?php if (!empty($pasien->transaksiTindakan)): ?>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tindakan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catatan</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Biaya</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($pasien->transaksiTindakan as $tindakan): ?>
                        <tr>
                            <td class="px-6 py-4"><?php echo CHtml::encode($tindakan->tanggal_tindakan); ?></td>
                            <td class="px-6 py-4"><?php echo CHtml::encode($tindakan->tindakan->nama_tindakan); ?></td>
                            <td class="px-6 py-4"><?php echo CHtml::encode($tindakan->catatan); ?></td>
                            <td class="px-6 py-4 text-right"><?php echo number_format($tindakan->biaya, 2, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-gray-600">Tidak ada transaksi tindakan.</p>
        <?php endif; ?>
    </div>

    <!-- Transaksi Obat -->
    <div class="bg-white shadow rounded-lg p-6 mb-6 ring-1 ring-sky-700">
        <h2 class="text-2xl font-bold mb-4">Transaksi Obat</h2>
        <?php if (!empty($pasien->transaksiObat)): ?>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Obat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dosis</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catatan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Biaya</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($pasien->transaksiObat as $obat): ?>
                        <tr>
                            <td class="px-6 py-4"><?php echo CHtml::encode($obat->tanggal_pemberian); ?></td>
                            <td class="px-6 py-4"><?php echo CHtml::encode($obat->obat->nama_obat); ?></td>
                            <td class="px-6 py-4"><?php echo CHtml::encode($obat->jumlah); ?></td>
                            <td class="px-6 py-4"><?php echo CHtml::encode($obat->dosis); ?></td>
                            <td class="px-6 py-4"><?php echo CHtml::encode($obat->catatan); ?></td>
                            <td class="px-6 py-4 text-right"><?php echo number_format($obat->biaya, 2, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-gray-600">Tidak ada transaksi obat.</p>
        <?php endif; ?>
    </div>

    <div class="flex space-x-4">
        <?php echo CHtml::link('Berikan Tindakan', array('doctor/giveTreatment', 'id' => $model->id), array('class' => 'bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded')); ?>
        <?php echo CHtml::link('Berikan Obat', array('doctor/giveMedication', 'id' => $model->id), array('class' => 'bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded')); ?>
    </div>
</div>