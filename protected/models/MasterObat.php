<?php

class MasterObat extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return MasterObat the static model class
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
        return 'master_obat';
    }
  
    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('nama_obat, harga', 'required'),
            array('nama_obat', 'length', 'max'=>100),
            array('jenis', 'length', 'max'=>50),
            array('satuan', 'length', 'max'=>20),
            array('harga', 'numerical'),
            // atribut berikut dianggap aman untuk mass assignment
            array('deskripsi, expired_date, created_at, updated_at', 'safe'),
        );
    }
  
    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            // Jika ada relasi dengan transaksi obat, misalnya:
            'transaksiObat' => array(self::HAS_MANY, 'TransaksiObatPasien', 'obat_id'),
        );
    }
  
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id'           => 'ID',
            'nama_obat'    => 'Nama Obat',
            'deskripsi'    => 'Deskripsi',
            'jenis'        => 'Jenis',
            'harga'        => 'Harga',
            'satuan'       => 'Satuan',
            'expired_date' => 'Tanggal Kedaluwarsa',
            'created_at'   => 'Dibuat',
            'updated_at'   => 'Diupdate',
        );
    }
}
