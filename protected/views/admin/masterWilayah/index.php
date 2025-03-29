<?php
/* @var $this AdminController */
/* @var $model MasterWilayah */
/* @var $topWilayah array */
$data = $dataProvider->data;
?>



<div class="grid mb-8 border border-gray-200 rounded-lg shadow-xs md:mb-12 md:grid-cols-3 bg-white">
    <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 text-sky-950 mb-3">
            <path d="M19.006 3.705a.75.75 0 1 0-.512-1.41L6 6.838V3a.75.75 0 0 0-.75-.75h-1.5A.75.75 0 0 0 3 3v4.93l-1.006.365a.75.75 0 0 0 .512 1.41l16.5-6Z" />
            <path fill-rule="evenodd" d="M3.019 11.114 18 5.667v3.421l4.006 1.457a.75.75 0 1 1-.512 1.41l-.494-.18v8.475h.75a.75.75 0 0 1 0 1.5H2.25a.75.75 0 0 1 0-1.5H3v-9.129l.019-.007ZM18 20.25v-9.566l1.5.546v9.02H18Zm-9-6a.75.75 0 0 0-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75V15a.75.75 0 0 0-.75-.75H9Z" clip-rule="evenodd" />
        </svg>

        <blockquote class="max-w-2xl mx-auto text-gray-500">
            <h3 class="text-lg font-semibold text-gray-900">Jumlah Cabang Wilayah</h3>
            <p class="font-bold"><?php echo count($data) ?> Klinik</p>
        </blockquote>
    </figure>
    <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 md:rounded-se-lg">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 text-sky-950 mb-3">
            <path d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
        </svg>

        <blockquote class="max-w-2xl mx-auto text-gray-500">
            <h3 class="text-lg font-semibold text-gray-900">Klinik Paling Ramai</h3>
            <p class="font-bold"><?php echo CHtml::encode($topWilayah['nama']); ?></p>
        </blockquote>
    </figure>
    <figure class="flex flex-col items-center justify-center p-8 text-center border-l bg-white border-b border-gray-200 md:rounded-se-lg">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 text-sky-950 mb-3">
            <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z" clip-rule="evenodd" />
            <path d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
        </svg>


        <blockquote class="max-w-2xl mx-auto text-gray-500">
            <h3 class="text-lg font-semibold text-gray-900">Klinik Dengan Dokter Terbanyak</h3>
            <p class="font-bold"><?php echo CHtml::encode($topWilayah['nama']); ?></p>
        </blockquote>
    </figure>
</div>


<div class="mb-10 flex flex-row justify-between items-center">
    <h1 class="text-3xl font-bold mb-6">Daftar Master Wilayah</h1>

    <div class="mb-4">
        <?php echo CHtml::link('Buat Master Wilayah Baru', array('admin/masterWilayahCreate'), array(
            'class' => 'bg-sky-700 hover:bg-sky-800 text-white font-bold py-2 px-4 rounded'
        )); ?>
    </div>
</div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg ring-1 ring-sky-700">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-sky-700">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Alamat
                </th>
                <th scope="col" class="px-6 py-3">
                    Kota
                </th>
                <th scope="col" class="px-6 py-3">
                    Provinsi
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $wilayah): ?>
                    <tr class="bg-white border-b border-sky-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <?php echo CHtml::encode($wilayah->nama); ?>
                        </th>
                        <td class="px-6 py-4">
                            <?php echo CHtml::encode($wilayah->alamat); ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo CHtml::encode($wilayah->kota); ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo CHtml::encode($wilayah->provinsi); ?>
                        </td>
                        <td class="px-6 py-4 text-right flex flex-row justify-end items-center gap-4">
                            <!-- View Icon Link -->
                            <?php echo CHtml::link(
                                '<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>',
                                array('masterWilayahView', 'id' => $wilayah->id),
                                array('class' => 'text-green-600 hover:text-green-700', 'title' => 'View')
                            ); ?>

                            <!-- Edit Icon Link -->
                            <?php echo CHtml::link(
                                '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 text-sky-700 hover:text-sky-900">
                                <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                </svg>',
                                array('masterWilayahUpdate', 'id' => $wilayah->id),
                                array('class' => 'text-blue-600 hover:text-blue-700', 'title' => 'Edit')
                            ); ?>

                            <!-- Delete Icon Link -->
                            <?php echo CHtml::link(
                                '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 text-red-700 hover:text-red-900">
                                <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                </svg>
                                ',
                                array('masterWilayahDelete', 'id' => $wilayah->id),
                                array(
                                    'submit' => array('masterWilayahDelete', 'id' => $wilayah->id),
                                    'confirm' => 'Apakah Anda yakin ingin menghapus data ini?'
                                )
                            ); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr class="bg-white border-b">
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                        Tidak ada data ditemukan.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>