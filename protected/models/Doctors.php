<?php

class Doctors extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Doctors the static model class
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
        return 'doctors';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            // user_id, specialty, dan wilayah_id wajib diisi
            array('user_id, specialty, wilayah_id', 'required'),
            array('user_id, wilayah_id', 'numerical', 'integerOnly' => true),
            array('specialty', 'length', 'max' => 100),
            array('created_at, updated_at', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            // Dokter terkait dengan satu user.
            'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
            // Dokter terkait dengan satu wilayah (MasterWilayah).
            'wilayah' => array(self::BELONGS_TO, 'MasterWilayah', 'wilayah_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id'         => 'ID',
            'user_id'    => 'User',
            'specialty'  => 'Spesialisasi',
            'wilayah_id' => 'Wilayah',
            'created_at' => 'Dibuat',
            'updated_at' => 'Diupdate',
        );
    }
}
