<?php

class MasterWilayah extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return MasterWilayah the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
  
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'master_wilayah';
    }
  
    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            // nama, kota, dan provinsi wajib diisi
            array('nama, kota, provinsi', 'required'),
            // batas panjang karakter
            array('nama, kota, provinsi', 'length', 'max'=>100),
            array('kode_pos', 'length', 'max'=>10),
            array('telepon, fax', 'length', 'max'=>20),
            array('email, website', 'length', 'max'=>100),
            // atribut lain yang boleh diisi secara massal
            array('alamat, created_at, updated_at', 'safe'),
        );
    }
  
    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // Saat ini tidak ada relasi khusus dengan tabel lain.
        return array();
    }
  
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id'         => 'ID',
            'nama'       => 'Nama',
            'alamat'     => 'Alamat',
            'kota'       => 'Kota',
            'provinsi'   => 'Provinsi',
            'kode_pos'   => 'Kode Pos',
            'telepon'    => 'Telepon',
            'fax'        => 'Fax',
            'email'      => 'Email',
            'website'    => 'Website',
            'created_at' => 'Dibuat',
            'updated_at' => 'Diupdate',
        );
    }
}
