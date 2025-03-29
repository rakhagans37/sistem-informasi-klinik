<?php

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Sistem Informasi Klinik',

    // Preload components
    'preload' => array('log'),

    // Autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),

    // Application components
    'components' => array(
        // Konfigurasi database menggunakan PostgreSQL
        'db' => array(
            'connectionString' => 'pgsql:host=localhost;port=5432;dbname=sistem_informasi_klinik',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            // Opsional: caching skema untuk meningkatkan performa
            'schemaCachingDuration' => 3600,
        ),
        
        // Konfigurasi RBAC menggunakan CDbAuthManager
        'authManager' => array(
            'class' => 'CDbAuthManager', // Menggunakan database untuk menyimpan data RBAC
            'connectionID' => 'db',
            // Anda dapat mengubah nama tabel jika diperlukan:
            // 'itemTable' => 'auth_item',
            // 'assignmentTable' => 'auth_assignment',
            // 'itemChildTable' => 'auth_item_child',
        ),
        
        // Komponen user untuk menangani login
        'user' => array(
            // Enable cookie-based authentication
            'allowAutoLogin' => true,
            'loginUrl' => array('site/login'),
        ),
        
        // Error handler
        'errorHandler' => array(
            // Menunjuk ke action error di SiteController
            'errorAction' => 'site/error',
        ),
        
        // Konfigurasi log
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                // Tambahan konfigurasi log lainnya jika diperlukan
            ),
        ),
    ),

    // Parameter global aplikasi
    'params' => array(
        // Misalnya, alamat email admin
        'adminEmail' => 'webmaster@inovamedika.com',
    ),
);
