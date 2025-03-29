<?php

class AdminController extends Controller
{
    public $layout = 'admin';

    /**
     * Terapkan filter agar hanya admin yang dapat mengakses seluruh aksi di controller ini.
     */
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    // Definisikan aturan akses
    public function accessRules()
    {
        return array(
            array(
                'allow',
                // Semua aksi di controller ini hanya boleh diakses oleh admin (misalnya role_id == 1)
                'expression' => 'Yii::app()->user->getState("role_id") == 1',
                'expression' => 'Yii::app()->user->getState("is_active") == 1',
            ),
            array('deny', 'users' => array('*')),
        );
    }

    public function actionMasterWilayahIndex()
    {
        $dataProvider = new CActiveDataProvider('MasterWilayah');


        // Query untuk mendapatkan wilayah dengan total transaksi tindakan dan obat terbanyak
        $sql = "SELECT 
                mw.id, 
                mw.nama, 
                COUNT(tt.id) AS total_tindakan, 
                COUNT(top.id) AS total_obat,
                (COUNT(tt.id) + COUNT(top.id)) AS total_transactions
            FROM master_wilayah mw
            LEFT JOIN transaksi_tindakan tt ON mw.id = tt.wilayah_id
            LEFT JOIN transaksi_obat_pasien top ON mw.id = top.wilayah_id
            GROUP BY mw.id, mw.nama
            ORDER BY total_transactions DESC
            LIMIT 1";
        $topWilayah = Yii::app()->db->createCommand($sql)->queryRow();

        $this->render('masterWilayah/index', array(
            'dataProvider' => $dataProvider,
            'topWilayah' => $topWilayah,
        ));
    }


    /**
     * Tampilkan detail satu data Master Wilayah.
     */
    public function actionMasterWilayahView($id)
    {
        $this->render('masterWilayah/view', array(
            'model' => $this->loadMasterWilayah($id),
        ));
    }

    /**
     * Buat data Master Wilayah baru.
     */
    public function actionMasterWilayahCreate()
    {
        $model = new MasterWilayah;

        // Uncomment untuk validasi Ajax jika diinginkan
        // $this->performAjaxValidation($model);

        if (isset($_POST['MasterWilayah'])) {
            $model->attributes = $_POST['MasterWilayah'];
            if ($model->save())
                $this->redirect(array('masterWilayahView', 'id' => $model->id));
        }

        $this->render('masterWilayah/create', array(
            'model' => $model,
        ));
    }

    /**
     * Update data Master Wilayah yang ada.
     */
    public function actionMasterWilayahUpdate($id)
    {
        $model = $this->loadMasterWilayah($id);

        // Uncomment untuk validasi Ajax jika diinginkan
        // $this->performAjaxValidation($model);

        if (isset($_POST['MasterWilayah'])) {
            $model->attributes = $_POST['MasterWilayah'];
            if ($model->save())
                $this->redirect(array('masterWilayahView', 'id' => $model->id));
        }

        $this->render('masterWilayah/update', array(
            'model' => $model,
        ));
    }

    /**
     * Hapus data Master Wilayah.
     */
    public function actionMasterWilayahDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
            $this->loadMasterWilayah($id)->delete();

            if (!isset($_GET['ajax']))
                $this->redirect(array('masterWilayahIndex'));
        } else {
            throw new CHttpException(400, 'Permintaan tidak valid. Silakan tidak mengulangi permintaan ini.');
        }
    }
    /**
     * Fungsi pembantu untuk mengambil model Master Wilayah berdasarkan primary key.
     */
    protected function loadMasterWilayah($id)
    {
        $model = MasterWilayah::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'Data Master Wilayah yang dimaksud tidak ditemukan.');
        return $model;
    }

    /**
     * (Optional) Fungsi untuk validasi Ajax.
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'master-wilayah-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    // Index: Menampilkan grid view Master Obat
    public function actionMasterObatIndex()
    {
        $dataProvider = new CActiveDataProvider('MasterObat');
        $this->render('masterObat/index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    // View: Menampilkan detail data Master Obat
    public function actionMasterObatView($id)
    {
        $this->render('masterObat/view', array(
            'model' => $this->loadMasterObat($id),
        ));
    }

    // Create: Membuat data Master Obat baru
    public function actionMasterObatCreate()
    {
        $model = new MasterObat;

        if (isset($_POST['MasterObat'])) {
            $model->attributes = $_POST['MasterObat'];
            if ($model->save())
                $this->redirect(array('masterObatView', 'id' => $model->id));
        }

        $this->render('masterObat/create', array(
            'model' => $model,
        ));
    }

    // Update: Memperbarui data Master Obat yang ada
    public function actionMasterObatUpdate($id)
    {
        $model = $this->loadMasterObat($id);

        if (isset($_POST['MasterObat'])) {
            $model->attributes = $_POST['MasterObat'];
            if ($model->save())
                $this->redirect(array('masterObatView', 'id' => $model->id));
        }

        $this->render('masterObat/update', array(
            'model' => $model,
        ));
    }

    // Delete: Menghapus data Master Obat
    public function actionMasterObatDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
            $this->loadMasterObat($id)->delete();
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('masterObatIndex'));
        } else {
            throw new CHttpException(400, 'Permintaan tidak valid.');
        }
    }

    // Fungsi pembantu untuk mengambil model Master Obat
    protected function loadMasterObat($id)
    {
        $model = MasterObat::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'Data yang diminta tidak ditemukan.');
        return $model;
    }

    // Index: Menampilkan grid view Master Obat
    public function actionMasterTindakanIndex()
    {
        $dataProvider = new CActiveDataProvider('MasterTindakan');
        $this->render('masterTindakan/index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    // Create: Membuat data Master Obat baru
    public function actionMasterTindakanCreate()
    {
        $model = new MasterTindakan;

        if (isset($_POST['MasterTindakan'])) {
            $model->attributes = $_POST['MasterTindakan'];
            if ($model->save())
                $this->redirect(array('masterTindakanView', 'id' => $model->id));
        }

        $this->render('masterTindakan/create', array(
            'model' => $model,
        ));
    }

    // Update: Memperbarui data Master Obat yang ada
    public function actionMasterTindakanUpdate($id)
    {
        $model = $this->loadMasterTindakan($id);

        if (isset($_POST['MasterTindakan'])) {
            $model->attributes = $_POST['MasterTindakan'];
            if ($model->save())
                $this->redirect(array('masterTindakanView', 'id' => $model->id));
        }

        $this->render('masterTindakan/update', array(
            'model' => $model,
        ));
    }

    // Delete: Menghapus data Master Obat
    public function actionMasterTindakanDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
            $this->loadMasterTindakan($id)->delete();
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('masterTindakanIndex'));
        } else {
            throw new CHttpException(400, 'Permintaan tidak valid.');
        }
    }

    // View: Menampilkan detail data Master Obat
    public function actionMasterTindakanView($id)
    {
        $this->render('masterTindakan/view', array(
            'model' => $this->loadMasterTindakan($id),
        ));
    }

    // Fungsi pembantu untuk mengambil model Master Obat
    protected function loadMasterTindakan($id)
    {
        $model = MasterTindakan::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'Data yang diminta tidak ditemukan.');
        return $model;
    }

    public function actionUserManagementIndex()
    {
        $dataProvider = new CActiveDataProvider('Users', array(
            'criteria' => array(
                'condition' => 'role_id != 1', // Hanya ambil pegawai (bukan admin)
            ),
            'pagination' => array(
                'pageSize' => 10,
            ),
        ));

        $this->render('userManagement/index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionToggleActivation()
    {
        if (isset($_GET['id'])) {
            $user = Users::model()->findByPk($_GET['id']);
            if ($user) {
                // Toggle is_active
                $user->is_active = !$user->is_active;
                if ($user->save()) {
                    // Redirect ke halaman yang sesuai setelah berhasil
                    $this->redirect(array('userManagementIndex'));
                } else {
                    throw new CHttpException(500, 'Gagal mengubah status pengguna.');
                }
            } else {
                throw new CHttpException(404, 'Pengguna tidak ditemukan.');
            }
        } else {
            throw new CHttpException(400, 'Permintaan tidak valid.');
        }
    }

    public function actionUserManagementUpdate($id)
    {
        // Ambil model Users
        $model = Users::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'User tidak ditemukan.');

        // Muat model staff terkait berdasarkan role
        if ($model->role_id == 2) { // Dokter
            $staffModel = Doctors::model()->findByAttributes(array('user_id' => $model->id));
        } elseif ($model->role_id == 3) { // Resepsionis
            $staffModel = Recepsionists::model()->findByAttributes(array('user_id' => $model->id));
        } elseif ($model->role_id == 4) { // Kasir
            $staffModel = Cashiers::model()->findByAttributes(array('user_id' => $model->id));
        } else {
            $staffModel = null;
        }

        if ($staffModel === null) {
            throw new CHttpException(404, 'Data staff terkait tidak ditemukan.');
        }

        if (isset($_POST['Users']['wilayah_id'])) {
            $staffModel->wilayah_id = $_POST['Users']['wilayah_id'];
            if ($staffModel->save()) {
                Yii::app()->user->setFlash('success', 'Data user berhasil diperbarui.');
                $this->redirect(array('userManagementIndex', 'id' => $model->id));
            } else {
                Yii::app()->user->setFlash('error', 'Gagal memperbarui data user.');
            }
        }

        $this->render('userManagement/edit', array(
            'model' => $model,
            'staffModel' => $staffModel,
        ));
    }

    public function actionDashboard()
    {
        // Query untuk omzet per minggu (menggabungkan data dari transaksi_tindakan dan transaksi_obat_pasien yang belum dibayar)
        $sqlOmzet = "SELECT CONCAT(YEAR(created_at), '-', WEEK(created_at)) AS minggu, SUM(biaya) AS total 
                 FROM (
                     SELECT created_at, biaya FROM transaksi_tindakan
                     UNION ALL
                     SELECT created_at, biaya FROM transaksi_obat_pasien
                 ) AS sub
                 GROUP BY CONCAT(YEAR(created_at), '-', WEEK(created_at))
                 ORDER BY CONCAT(YEAR(created_at), '-', WEEK(created_at))";
        $omzetData = Yii::app()->db->createCommand($sqlOmzet)->queryAll();

        $omzetLabels = array();
        $omzetValues = array();
        foreach ($omzetData as $row) {
            $omzetLabels[] = $row['minggu'];
            $omzetValues = (float)$row['total'];
        }

        // Query untuk penjualan obat per minggu
        $sqlObat = "SELECT CONCAT(YEAR(created_at), '-', WEEK(created_at)) AS minggu, COUNT(*) AS total 
                FROM transaksi_obat_pasien 
                GROUP BY CONCAT(YEAR(created_at), '-', WEEK(created_at))
                ORDER BY CONCAT(YEAR(created_at), '-', WEEK(created_at))";
        $obatData = Yii::app()->db->createCommand($sqlObat)->queryAll();

        $obatLabels = array();
        $obatValues = array();
        foreach ($obatData as $row) {
            $obatLabels[] = $row['minggu'];
            $obatValues[] = (int)$row['total'];
        }

        // Query untuk tindakan per minggu
        $sqlTindakan = "SELECT CONCAT(YEAR(created_at), '-', WEEK(created_at)) AS minggu, COUNT(*) AS total 
                    FROM transaksi_tindakan 
                    GROUP BY CONCAT(YEAR(created_at), '-', WEEK(created_at))
                    ORDER BY CONCAT(YEAR(created_at), '-', WEEK(created_at))";
        $tindakanData = Yii::app()->db->createCommand($sqlTindakan)->queryAll();

        $tindakanLabels = array();
        $tindakanValues = array();
        foreach ($tindakanData as $row) {
            $tindakanLabels[] = $row['minggu'];
            $tindakanValues[] = (int)$row['total'];
        }

        // Kirim data ke view dalam format JSON agar Chart.js dapat memprosesnya
        $this->render('dashboard', array(
            'omzetLabels'    => json_encode($omzetLabels),
            'omzetValues'    => json_encode($omzetValues),
            'obatLabels'     => json_encode($obatLabels),
            'obatValues'     => json_encode($obatValues),
            'tindakanLabels' => json_encode($tindakanLabels),
            'tindakanValues' => json_encode($tindakanValues),
        ));
    }
}
