<?php

class DoctorController extends Controller
{
    public $layout = 'doctor'; // Layout yang digunakan untuk tampilan ini

    public function filters()
    {
        return array(
            'accessControl', // Filter akses
        );
    }

    public function accessRules()
    {
        return array(
            array(
                'allow',
                // Gabungkan kondisi role dan is_active
                'expression' => 'Yii::app()->user->getState("role_id") == 2 && Yii::app()->user->getState("is_active") == 1',
            ),
            array('deny', 'users' => array('*')),
        );
    }

    public function actionIndex()
    {
        $doctorId = Yii::app()->user->getState('doctor_id');

        if (empty($doctorId)) {
            throw new CHttpException(403, 'Doctor ID tidak terdeteksi. Pastikan Anda login sebagai dokter.');
        }

        $criteria = new CDbCriteria;
        $criteria->condition = 'doctor_id = :doctorId AND status = :pending';
        $criteria->params = array(
            ':doctorId' => $doctorId,
            ':pending'  => 'pending',
        );

        $dataProvider = new CActiveDataProvider('Appointments', array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 10),
        ));

        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionDetail($id)
    {
        // Ambil appointment berdasarkan ID
        $appointment = Appointments::model()->findByPk($id);
        if ($appointment === null)
            throw new CHttpException(404, 'Data appointment tidak ditemukan.');

        // Pastikan appointment sesuai dengan dokter yang login (opsional, untuk keamanan)
        $doctorId = Yii::app()->user->getState('doctor_id');
        if ($appointment->doctor_id != $doctorId)
            throw new CHttpException(403, 'Anda tidak memiliki akses ke data ini.');

        $this->render('detail', array(
            'model' => $appointment,
        ));
    }

    public function actionGiveTreatment($id)
    {
        // Ambil appointment berdasarkan ID
        $appointment = Appointments::model()->findByPk($id);

        if ($appointment === null)
            throw new CHttpException(404, 'Appointment tidak ditemukan.');

        // Buat model baru untuk transaksi tindakan, misalnya: TransaksiTindakan
        $treatmentModel = new TransaksiTindakan;
        $treatmentModel->pasien_id = $appointment->pasien_id;
        $treatmentModel->dokter_id = $appointment->doctor_id;
        // Asumsikan ada field tindakan_id, catatan, biaya, dll.

        if (isset($_POST['TransaksiTindakan'])) {
            $doctor = Doctors::model()->findByPk($appointment->doctor_id);
            $tindakan = MasterTindakan::model()->findByPk($_POST['TransaksiTindakan']['tindakan_id']);
            $treatmentModel->attributes = $_POST['TransaksiTindakan'];
            $treatmentModel->wilayah_id = $doctor->wilayah_id; // Ambil wilayah dari dokter
            $treatmentModel->biaya = $tindakan->biaya; // Ambil biaya dari tindakan yang dipilih
            $treatmentModel->tanggal_tindakan = date('Y-m-d H:i:s'); // Set tanggal tindakan ke waktu saat ini

            if ($treatmentModel->save()) {
                Yii::app()->user->setFlash('success', 'Tindakan berhasil disimpan.');
                $this->redirect(array('doctor/detail', 'id' => $appointment->id));
            } else {
                //Berikan alasan error
                Yii::app()->user->setFlash('error', $treatmentModel->getErrors());
            }
        }
        $this->render('giveTreatment', array(
            'appointment' => $appointment,
            'treatmentModel' => $treatmentModel,
        ));
    }

    public function actionGiveMedication($id)
    {
        $appointment = Appointments::model()->findByPk($id);
        if ($appointment === null)
            throw new CHttpException(404, 'Appointment tidak ditemukan.');

        $medicationModel = new TransaksiObatPasien;
        $medicationModel->pasien_id = $appointment->pasien_id;
        $medicationModel->dokter_id = $appointment->doctor_id;  // Atau field yang sesuai

        if (isset($_POST['TransaksiObatPasien'])) {
            $doctor = Doctors::model()->findByPk($appointment->doctor_id);
            $obat = MasterObat::model()->findByPk($_POST['TransaksiObatPasien']['obat_id']);
            $medicationModel->attributes = $_POST['TransaksiObatPasien'];
            $medicationModel->wilayah_id = $doctor->wilayah_id; // Ambil wilayah dari dokter
            $medicationModel->tanggal_pemberian = date('Y-m-d H:i:s'); // Set tanggal pemberian ke waktu saat ini
            $biaya = $obat->harga * $medicationModel->jumlah; // Hitung biaya berdasarkan harga dan jumlah
            $medicationModel->biaya = $biaya; // Set biaya ke model
            if ($medicationModel->save()) {
                Yii::app()->user->setFlash('success', 'Obat berhasil diberikan.');
                $this->redirect(array('doctor/detail', 'id' => $appointment->id));
            } else {
                Yii::app()->user->setFlash('error', 'Gagal menyimpan data obat.');
            }
        }
        $this->render('giveMedication', array(
            'appointment' => $appointment,
            'medicationModel' => $medicationModel,
        ));
    }
}
