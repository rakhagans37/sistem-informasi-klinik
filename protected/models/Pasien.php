<?php

class Pasien extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Pasien the static model class
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
        return 'pasien';
    }
  
    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            // nomor_registrasi dan nama wajib diisi
            array('nomor_registrasi, nama', 'required'),
            array('nomor_registrasi', 'length', 'max'=>50),
            array('nama', 'length', 'max'=>100),
            array('jenis_kelamin', 'length', 'max'=>10),
            array('tempat_lahir', 'length', 'max'=>50),
            array('telepon', 'length', 'max'=>20),
            array('email', 'length', 'max'=>100),
            // atribut tanggal_lahir dan alamat dianggap aman untuk mass assignment
            array('tanggal_lahir, alamat, created_at, updated_at', 'safe'),
            // Rules for search scenario
            array('id, nomor_registrasi, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, telepon, email, created_at, updated_at', 'safe', 'on'=>'search'),
        );
    }
  
    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            // Contoh relasi: jika ada transaksi tindakan yang berhubungan dengan pasien
            'transaksiTindakan' => array(self::HAS_MANY, 'TransaksiTindakan', 'pasien_id'),
            // Contoh relasi: jika ada transaksi obat pasien yang berhubungan
            'transaksiObat' => array(self::HAS_MANY, 'TransaksiObatPasien', 'pasien_id'),
        );
    }
  
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id'                => 'ID',
            'nomor_registrasi'  => 'Nomor Registrasi',
            'nama'              => 'Nama',
            'jenis_kelamin'     => 'Jenis Kelamin',
            'tempat_lahir'      => 'Tempat Lahir',
            'tanggal_lahir'     => 'Tanggal Lahir',
            'alamat'            => 'Alamat',
            'telepon'           => 'Telepon',
            'email'             => 'Email',
            'created_at'        => 'Dibuat',
            'updated_at'        => 'Diupdate',
        );
    }
}
