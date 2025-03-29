<?php
/* @var $this AdminController */
/* @var $model MasterTindakan */
$data = $dataProvider->data;
?>

<div class="mb-10 flex flex-row justify-between items-center">
    <h1 class="text-3xl font-bold mb-6">Daftar Tindakan</h1>

    <div class="mb-4">
        <?php echo CHtml::link('Buat Master Tindakan Baru', array('admin/masterTindakanCreate'), array(
            'class' => 'bg-sky-700 hover:bg-sky-800 text-white font-bold py-2 px-4 rounded'
        )); ?>
    </div>
</div>

<div class="relative overflow-x-auto sm:rounded-lg ring-1 ring-sky-700">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-sky-700">
            <tr>
                <th scope="col" class="px-6 py-3">Nama Tindakan</th>
                <th scope="col" class="px-6 py-3">Deskripsi</th>
                <th scope="col" class="px-6 py-3">Biaya</th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Actions</span>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $tindakan): ?>
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <?php echo CHtml::encode($tindakan->nama_tindakan); ?>
                        </th>
                        <td class="px-6 py-4">
                            <?php echo CHtml::encode($tindakan->deskripsi); ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo "Rp. " . number_format($tindakan->biaya, 2, ',', '.'); ?>
                        </td>
                        <td class="px-6 py-4 text-right flex flex-row justify-end items-center gap-4">
                            <!-- View Icon Link -->
                            <?php echo CHtml::link(
                                '<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>',
                                array('admin/masterTindakanView', 'id' => $tindakan->id),
                                array('class' => 'text-green-600 hover:text-green-700', 'title' => 'View')
                            ); ?>
                            <!-- Edit Icon Link -->
                            <?php echo CHtml::link(
                                '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 text-sky-700">
                                <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                </svg>
                                ',
                                array('admin/masterTindakanUpdate', 'id' => $tindakan->id),
                                array('class' => 'text-blue-600 hover:text-blue-700', 'title' => 'Edit')
                            ); ?>
                            <!-- Delete Icon Link -->
                            <?php echo CHtml::link(
                                '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 text-red-700">
                                <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                </svg>
                                ',
                                array('admin/masterTindakanDelete', 'id' => $tindakan->id),
                                array(
                                    'submit' => array('masterTindakanDelete', 'id' => $tindakan->id),
                                    'confirm' => 'Apakah Anda yakin ingin menghapus data ini?'
                                )
                            ); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr class="bg-white border-b">
                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                        Tidak ada data ditemukan.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>