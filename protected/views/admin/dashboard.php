<?php
/* @var $this AdminController */
$this->pageTitle = "Dashboard Admin";
?>


<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Dashboard Admin</h1>

    <!-- Ringkasan Informasi (Opsional) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white shadow rounded-lg p-4">
            <p class="text-sm text-gray-500">Total Omzet Bulan Ini</p>
            <p class="text-2xl font-bold">Rp <?php echo $omzetValues; ?></p>
        </div>
        <div class="bg-white shadow rounded-lg p-4">
            <p class="text-sm text-gray-500">Jumlah Transaksi</p>
            <p class="text-2xl font-bold">120 Transaksi</p>
        </div>
        <div class="bg-white shadow rounded-lg p-4">
            <p class="text-sm text-gray-500">Pasien Baru</p>
            <p class="text-2xl font-bold">35 Pasien</p>
        </div>
    </div>

    <div class="grid grid-cols-3 gap-6">
        <!-- Grafik Omzet -->
        <div class="bg-white shadow rounded-lg p-6 mb-6">
            <h2 class="text-2xl font-bold mb-4">Grafik Omzet</h2>
            <canvas id="omzetChart"></canvas>
        </div>
        <!-- Grafik Penjualan Obat -->
        <div class="bg-white shadow rounded-lg p-6 mb-6">
            <h2 class="text-2xl font-bold mb-4">Grafik Penjualan Obat</h2>
            <canvas id="obatChart"></canvas>
        </div>
        <!-- Grafik Tindakan -->
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Grafik Tindakan</h2>
            <canvas id="tindakanChart"></canvas>
        </div>
    </div>
</div>

<!-- Sertakan Chart.js dari CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Grafik Omzet
        var ctxOmzet = document.getElementById('omzetChart').getContext('2d');
        var omzetChart = new Chart(ctxOmzet, {
            type: 'line',
            data: {
                labels: <?php echo $omzetLabels; ?>,
                datasets: [{
                    label: 'Omzet (Rp)',
                    data: <?php echo $omzetValues; ?>,
                    borderColor: 'rgba(59, 130, 246, 1)',
                    backgroundColor: 'rgba(59, 130, 246, 0.2)',
                    fill: true,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            // Format angka dengan prefix "Rp"
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });

        // Grafik Penjualan Obat
        var ctxObat = document.getElementById('obatChart').getContext('2d');
        var obatChart = new Chart(ctxObat, {
            type: 'bar',
            data: {
                labels: <?php echo $obatLabels; ?>,
                datasets: [{
                    label: 'Transaksi Obat',
                    data: <?php echo $obatValues; ?>,
                    backgroundColor: 'rgba(234, 88, 12, 0.7)',
                    borderColor: 'rgba(234, 88, 12, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });

        // Grafik Tindakan
        var ctxTindakan = document.getElementById('tindakanChart').getContext('2d');
        var tindakanChart = new Chart(ctxTindakan, {
            type: 'bar',
            data: {
                labels: <?php echo $tindakanLabels; ?>,
                datasets: [{
                    label: 'Transaksi Tindakan',
                    data: <?php echo $tindakanValues; ?>,
                    backgroundColor: 'rgba(16, 185, 129, 0.7)',
                    borderColor: 'rgba(16, 185, 129, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    });
</script>