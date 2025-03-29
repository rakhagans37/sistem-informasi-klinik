<?php

class DoctorController extends Controller
{
    // Terapkan filter akses
    public function filters()
    {
        return array(
            'accessControl', // filter akses akan memeriksa aturan di accessRules()
        );
    }

    // Definisikan aturan akses
    public function accessRules()
    {
        return array(
            array(
                'allow',
                'actions' => array('index', 'dashboard'), // daftar aksi yang diizinkan
                'expression' => 'Yii::app()->user->getState("role_id") == 4',
            ),
            array('deny', 'users' => array('*')),
        );
    }

    public function actionIndex()
    {
        // Render view "index" di folder protected/views/admin
        $this->render('index');
    }
}
