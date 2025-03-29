<?php

class ResepcionistController extends Controller
{
    public $layout = 'recepsionists'; // Layout yang digunakan untuk tampilan ini
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
                'expression' => 'Yii::app()->user->getState("role_id") == 3',
                'expression' => 'Yii::app()->user->getState("is_active") == 1',
            ),
            array('deny', 'users' => array('*')),
        );
    }

    public function actionIndex()
    {
        // Ambil wilayah_id dari state pengguna yang login
        $wilayah_id = Yii::app()->user->getState('wilayah_id');

        // Buat kriteria untuk mengambil appointment berdasarkan wilayah dari doctor
        $criteria = new CDbCriteria;
        // Pastikan kita melakukan join dengan relasi 'doctor'
        $criteria->with = array('doctor');
        $criteria->together = true;
        $criteria->condition = 'doctor.wilayah_id = :wilayah_id';
        $criteria->params = array(':wilayah_id' => $wilayah_id);

        // Buat dataProvider untuk model Appointments
        $dataProvider = new CActiveDataProvider('Appointments', array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 10),
        ));

        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionCreate()
    {
        // Model untuk appointment baru
        $appointment = new Appointments;
        // Model untuk data pasien baru (jika opsi "new" dipilih)
        $patientModel = new Pasien;

        if (isset($_POST['Appointments'])) {
            if (!isset($_POST['Appointments']['nomor_registrasi']) || trim($_POST['Appointments']['nomor_registrasi']) == '') {
                $patientModel->attributes = $_POST['Pasien'];
                // Generate nomor registrasi otomatis jika belum ada
                $patientModel->nomor_registrasi = rand(1000, 9999) . date('Ymd') . '-' . rand(1000, 9999);

                if ($patientModel->save()) {
                    // Set atribut lainnya untuk appointment
                    $appointment->attributes = $_POST['Appointments'];
                    $appointment->pasien_id = $patientModel->id;
                } else {
                    // Tampilkan error dari patientModel untuk debugging
                    Yii::app()->user->setFlash(
                        'error',
                        'Gagal menyimpan data pasien baru: ' .
                            implode(', ', array_map(function ($e) {
                                return implode('; ', $e);
                            }, $patientModel->getErrors()))
                    );
                    $this->render('create', array(
                        'model' => $appointment,
                        'patientModel' => $patientModel,
                    ));
                    Yii::app()->end();
                }
            } else {
                // Jika pasien sudah ada, ambil ID pasien berdasarkan nomor registrasi
                $existingPatient = Pasien::model()->findByAttributes(array('nomor_registrasi' => $_POST['Appointments']['nomor_registrasi']));
                if ($existingPatient === null) {
                    Yii::app()->user->setFlash('error', 'Pasien dengan nomor registrasi tersebut tidak ditemukan.');
                    $this->render('create', array(
                        'model' => $appointment,
                        'patientModel' => $patientModel,
                    ));
                    Yii::app()->end();
                }

                $appointment->attributes = $_POST['Appointments'];
                $appointment->pasien_id = $existingPatient->id;
            }

            if ($appointment->save()) {
                Yii::app()->user->setFlash('success', 'Appointment berhasil dibuat.');
                $this->redirect(array('view', 'id' => $appointment->id));
            } else {
                Yii::app()->user->setFlash('error', 'Gagal membuat appointment: ' . implode(', ', array_map(function ($e) {
                    return implode('; ', $e);
                }, $appointment->getErrors())));
            }
        }

        $this->render('create', array(
            'model' => $appointment,
            'patientModel' => $patientModel,
        ));
    }
}
