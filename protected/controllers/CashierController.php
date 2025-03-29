<?php

class CashierController extends Controller
{
    public $layout = 'cashier'; // Layout yang digunakan untuk tampilan ini
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
                'expression' => 'Yii::app()->user->getState("role_id") == 4',
                'expression' => 'Yii::app()->user->getState("is_active") == 1',
            ),
            array('deny', 'users' => array('*')),
        );
    }

    public function actionIndex()
    {
        // Jika ada filter pencarian nomor registrasi
        $search = isset($_GET['nomor_registrasi']) ? trim($_GET['nomor_registrasi']) : '';

        // Query SQL untuk mengambil data pasien dengan outstanding dari kedua tabel
        $sql = "SELECT 
                p.id, 
                p.nomor_registrasi, 
                p.nama,
                COALESCE(SUM(t.biaya),0) AS total_tindakan,
                COALESCE(SUM(o.biaya),0) AS total_obat,
                (COALESCE(SUM(t.biaya),0) + COALESCE(SUM(o.biaya),0)) AS total_outstanding
            FROM pasien p
            LEFT JOIN transaksi_tindakan t 
                ON p.id = t.pasien_id AND t.tanggal_bayar IS NULL
            LEFT JOIN transaksi_obat_pasien o 
                ON p.id = o.pasien_id AND o.tanggal_bayar IS NULL
            WHERE 1=1 ";

        $params = array();

        if ($search !== '') {
            $sql .= " AND p.nomor_registrasi LIKE :nr ";
            $params[':nr'] = '%' . $search . '%';
        }

        $sql .= " GROUP BY p.id, p.nomor_registrasi, p.nama
              HAVING total_outstanding > 0";

        // Hitung total item untuk pagination
        $countSql = "SELECT COUNT(*) FROM (" . $sql . ") AS sub";
        $total = Yii::app()->db->createCommand($countSql)->queryScalar($params);

        $dataProvider = new CSqlDataProvider($sql, array(
            'params' => $params,
            'totalItemCount' => $total,
            'pagination' => array('pageSize' => 10),
        ));

        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'search' => $search,
        ));
    }

    public function actionView($id)
    {
        $sql = "SELECT 
            p.id, 
            p.nomor_registrasi, 
            p.nama,
            COALESCE(SUM(t.biaya),0) AS total_tindakan,
            COALESCE(SUM(o.biaya),0) AS total_obat,
            (COALESCE(SUM(t.biaya),0) + COALESCE(SUM(o.biaya),0)) AS total_outstanding
        FROM pasien p
        LEFT JOIN transaksi_tindakan t 
            ON p.id = t.pasien_id AND t.tanggal_bayar IS NULL
        LEFT JOIN transaksi_obat_pasien o 
            ON p.id = o.pasien_id AND o.tanggal_bayar IS NULL
        WHERE p.id = :id
        GROUP BY p.id, p.nomor_registrasi, p.nama";

        $command = Yii::app()->db->createCommand($sql);
        $command->bindValue(':id', (int)$id, PDO::PARAM_INT);
        $patientData = $command->queryRow();

        if (!$patientData) {
            throw new CHttpException(404, 'Data pasien tidak ditemukan.');
        }

        $this->render('view', array(
            'patientData' => $patientData,
        ));
    }

    public function actionConfirmPayment($id)
    {
        // $id adalah id pasien
        $timestamp = new CDbExpression('CURRENT_TIMESTAMP');

        // Update transaksi tindakan
        Yii::app()->db->createCommand()->update(
            'transaksi_tindakan',
            array('tanggal_bayar' => $timestamp),
            'pasien_id=:id AND tanggal_bayar IS NULL',
            array(':id' => $id)
        );

        // Update transaksi obat
        Yii::app()->db->createCommand()->update(
            'transaksi_obat_pasien',
            array('tanggal_bayar' => $timestamp),
            'pasien_id=:id AND tanggal_bayar IS NULL',
            array(':id' => $id)
        );

        Yii::app()->user->setFlash('success', 'Pembayaran berhasil dikonfirmasi.');
        $this->redirect(array('view', 'id' => $id));
    }
}
