<?php

class TransaksiObatPasien extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return TransaksiObatPasien the static model class
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
        return 'transaksi_obat_pasien';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            // Pastikan pasien_id, jumlah, tanggal_pemberian, dan wilayah_id wajib diisi
            array('pasien_id, jumlah, tanggal_pemberian, wilayah_id', 'required'),
            array('pasien_id, dokter_id, obat_id, jumlah, wilayah_id', 'numerical', 'integerOnly' => true),
            array('dosis', 'length', 'max' => 100),
            // Atribut lain dianggap aman untuk mass assignment
            array('catatan, created_at, updated_at', 'safe'),
            // Rule untuk pencarian (opsional)
            array('id, pasien_id, dokter_id, obat_id, jumlah, dosis, tanggal_pemberian, catatan, created_at, updated_at, wilayah_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            // Relasi ke model Pasien melalui pasien_id
            'pasien'   => array(self::BELONGS_TO, 'Pasien', 'pasien_id'),
            // Relasi ke model Doctors melalui dokter_id
            'dokter'   => array(self::BELONGS_TO, 'Doctors', 'dokter_id'),
            // Relasi ke model MasterObat melalui obat_id
            'obat'     => array(self::BELONGS_TO, 'MasterObat', 'obat_id'),
            // Relasi ke model MasterWilayah melalui wilayah_id
            'wilayah'  => array(self::BELONGS_TO, 'MasterWilayah', 'wilayah_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id'                => 'ID',
            'pasien_id'         => 'Pasien',
            'dokter_id'         => 'Dokter',
            'obat_id'           => 'Obat',
            'jumlah'            => 'Jumlah',
            'dosis'             => 'Dosis',
            'tanggal_pemberian' => 'Tanggal Pemberian',
            'catatan'           => 'Catatan',
            'created_at'        => 'Dibuat',
            'updated_at'        => 'Diupdate',
            'wilayah_id'        => 'Wilayah',
        );
    }
}
