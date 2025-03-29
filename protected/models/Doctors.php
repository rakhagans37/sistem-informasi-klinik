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
            array('user_id, specialty', 'required'),
            array('user_id', 'numerical', 'integerOnly' => true),
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
            // Relasi ke model Users: masing-masing dokter terkait dengan satu user.
            'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
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
            'created_at' => 'Dibuat',
            'updated_at' => 'Diupdate',
        );
    }
}
