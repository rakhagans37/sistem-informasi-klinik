<?php

class Recepsionists extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Recepsionists the static model class
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
        return 'recepsionists';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('wilayah_id, user_id', 'required'),
            array('wilayah_id, user_id', 'numerical', 'integerOnly' => true),
            array('created_at, updated_at', 'safe'),
            // Rules for search
            array('id, wilayah_id, user_id, created_at, updated_at', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            // Hubungan ke MasterWilayah
            'wilayah' => array(self::BELONGS_TO, 'MasterWilayah', 'wilayah_id'),
            // Hubungan ke Users
            'user'    => array(self::BELONGS_TO, 'Users', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label).
     */
    public function attributeLabels()
    {
        return array(
            'id'         => 'ID',
            'wilayah_id' => 'Wilayah',
            'user_id'    => 'User',
            'created_at' => 'Dibuat',
            'updated_at' => 'Diupdate',
        );
    }
}
