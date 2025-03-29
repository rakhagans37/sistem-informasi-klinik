<?php

class TransaksiTindakan extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return TransaksiTindakan the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name.
     */
    public function tableName()
    {
        return 'transaksi_tindakan';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            // pasien_id, wilayah_id, dan tanggal_tindakan wajib diisi
            array('pasien_id, wilayah_id, tanggal_tindakan', 'required'),
            // Validasi numerik untuk kolom yang mengacu pada relasi
            array('pasien_id, dokter_id, tindakan_id, wilayah_id', 'numerical', 'integerOnly' => true),
            // Validasi numerik untuk biaya
            array('biaya', 'numerical'),
            // Kolom lainnya dianggap aman untuk mass assignment
            array('catatan, tanggal_bayar, created_at, updated_at', 'safe'),
            // Rules untuk search scenario
            array('id, pasien_id, dokter_id, tindakan_id, wilayah_id, tanggal_tindakan, tanggal_bayar, catatan, biaya, created_at, updated_at', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            // Relasi ke model Pasien
            'pasien'   => array(self::BELONGS_TO, 'Pasien', 'pasien_id'),
            // Relasi ke model Doctors
            'dokter'   => array(self::BELONGS_TO, 'Doctors', 'dokter_id'),
            // Relasi ke model MasterTindakan
            'tindakan' => array(self::BELONGS_TO, 'MasterTindakan', 'tindakan_id'),
            // Relasi ke model MasterWilayah
            'wilayah'  => array(self::BELONGS_TO, 'MasterWilayah', 'wilayah_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label).
     */
    public function attributeLabels()
    {
        return array(
            'id'               => 'ID',
            'pasien_id'        => 'Pasien',
            'dokter_id'        => 'Dokter',
            'tindakan_id'      => 'Tindakan',
            'wilayah_id'       => 'Wilayah',
            'tanggal_tindakan' => 'Tanggal Tindakan',
            'tanggal_bayar'    => 'Tanggal Bayar',
            'catatan'          => 'Catatan',
            'biaya'            => 'Biaya',
            'created_at'       => 'Dibuat',
            'updated_at'       => 'Diupdate',
        );
    }
}
