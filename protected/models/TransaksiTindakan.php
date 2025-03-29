<?php

class TransaksiTindakan extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return TransaksiTindakan the static model class
     */
    public static function model($className=__CLASS__)
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
            // Pasien dan tanggal tindakan wajib diisi
            array('pasien_id, tanggal_tindakan', 'required'),
            // Validasi numerik untuk id relasi
            array('pasien_id, dokter_id, tindakan_id', 'numerical', 'integerOnly'=>true),
            // Biaya divalidasi sebagai numerik (bisa berupa desimal)
            array('biaya', 'numerical'),
            // Kolom lain dianggap aman untuk mass assignment
            array('catatan, created_at, updated_at', 'safe'),
            // Rules untuk pencarian
            array('id, pasien_id, dokter_id, tindakan_id, tanggal_tindakan, catatan, biaya, created_at, updated_at', 'safe', 'on'=>'search'),
        );
    }
  
    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            // Relasi ke model Pasien melalui pasien_id
            'pasien' => array(self::BELONGS_TO, 'Pasien', 'pasien_id'),
            // Relasi ke model Doctors melalui dokter_id (mengacu ke tabel doctors)
            'dokter' => array(self::BELONGS_TO, 'Doctors', 'dokter_id'),
            // Relasi ke model MasterTindakan melalui tindakan_id
            'tindakan' => array(self::BELONGS_TO, 'MasterTindakan', 'tindakan_id'),
        );
    }
  
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id'               => 'ID',
            'pasien_id'        => 'Pasien',
            'dokter_id'        => 'Dokter',
            'tindakan_id'      => 'Tindakan',
            'tanggal_tindakan' => 'Tanggal Tindakan',
            'catatan'          => 'Catatan',
            'biaya'            => 'Biaya',
            'created_at'       => 'Dibuat',
            'updated_at'       => 'Diupdate',
        );
    }
}
