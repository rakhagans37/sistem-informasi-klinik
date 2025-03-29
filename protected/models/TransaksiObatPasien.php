<?php

class TransaksiObatPasien extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return TransaksiObatPasien the static model class
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
        return 'transaksi_obat_pasien';
    }
  
    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('pasien_id, jumlah, tanggal_pemberian', 'required'),
            array('pasien_id, dokter_id, obat_id, jumlah', 'numerical', 'integerOnly'=>true),
            array('dosis', 'length', 'max'=>100),
            // Atribut lain dianggap aman untuk mass assignment
            array('catatan, created_at, updated_at', 'safe'),
            // Rule untuk pencarian (jika dibutuhkan)
            array('id, pasien_id, dokter_id, obat_id, jumlah, dosis, tanggal_pemberian, catatan, created_at, updated_at', 'safe', 'on'=>'search'),
        );
    }
  
    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            // Relasi ke model Pasien
            'pasien' => array(self::BELONGS_TO, 'Pasien', 'pasien_id'),
            // Relasi ke model Users untuk dokter
            'dokter' => array(self::BELONGS_TO, 'Users', 'dokter_id'),
            // Relasi ke model MasterObat
            'obat' => array(self::BELONGS_TO, 'MasterObat', 'obat_id'),
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
        );
    }
}
