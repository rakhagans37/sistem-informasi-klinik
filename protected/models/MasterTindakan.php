<?php

class MasterTindakan extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return MasterTindakan the static model class
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
        return 'master_tindakan';
    }
  
    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('nama_tindakan, biaya', 'required'),
            array('nama_tindakan', 'length', 'max'=>100),
            array('biaya', 'numerical'),
            // Atribut ini dianggap aman untuk mass assignment
            array('deskripsi, created_at, updated_at', 'safe'),
        );
    }
  
    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            // Jika ada relasi dengan tabel transaksi_tindakan, contohnya:
            'transaksiTindakan' => array(self::HAS_MANY, 'TransaksiTindakan', 'tindakan_id'),
        );
    }
  
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id'            => 'ID',
            'nama_tindakan' => 'Nama Tindakan',
            'deskripsi'     => 'Deskripsi',
            'biaya'         => 'Biaya',
            'created_at'    => 'Dibuat',
            'updated_at'    => 'Diupdate',
        );
    }
}
