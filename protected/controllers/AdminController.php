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
}
