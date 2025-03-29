<?php $currentRoute = Yii::app()->controller->route; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - <?php echo CHtml::encode($this->pageTitle); ?></title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Admin Panel</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <?php $currentRoute = Yii::app()->controller->route; ?>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <?php echo CHtml::link('Home', array('/admin/index'), array(
                            'class' => ($currentRoute == 'admin/index') ? 'text-sky-500 font-bold' : 'text-white hover:text-gray-300'
                        )); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('Laporan', array('/admin/dashboard'), array(
                            'class' => ($currentRoute == 'admin/dashboard') ? 'text-sky-500 font-bold' : 'text-white hover:text-gray-300'
                        )); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('Master Wilayah', array('/admin/masterWilayahIndex'), array(
                            'class' => ($currentRoute == 'admin/masterWilayahIndex') ? 'text-sky-500 font-bold' : 'text-white hover:text-gray-300'
                        )); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('Master Tindakan', array('/admin/masterTindakanIndex'), array(
                            'class' => ($currentRoute == 'admin/masterTindakanIndex') ? 'text-sky-500 font-bold' : 'text-white hover:text-gray-300'
                        )); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('Master Obat', array('/admin/masterObatIndex'), array(
                            'class' => ($currentRoute == 'admin/masterObatIndex') ? 'text-sky-500 font-bold' : 'text-white hover:text-gray-300'
                        )); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('User Management', array('/admin/userManagementIndex'), array(
                            'class' => ($currentRoute == 'admin/userManagement') ? 'text-sky-500 font-bold' : 'text-white hover:text-gray-300'
                        )); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('Logout', array('/site/logout'), array(
                            'class' => 'text-white hover:text-gray-300'
                        )); ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="content" class="px-32 py-16 flex flex-col">
        <?php echo $content; ?>
    </div>

</body>

</html>