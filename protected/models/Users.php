<?php

class Users extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Users the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
  
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'users';
    }
  
    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('fullname, password, email, role_id, wilayah_id', 'required'),
            array('fullname', 'length', 'max' => 50),
            array('password', 'length', 'max' => 255),
            array('email', 'length', 'max' => 100),
            array('email', 'unique'),
            array('role_id, wilayah_id', 'numerical', 'integerOnly' => true),
            // Safe attributes untuk search atau update
            array('id, fullname, email, role_id, wilayah_id, created_at, updated_at', 'safe', 'on' => 'search'),
        );
    }
  
    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            // Relasi ke model Roles melalui kolom role_id
            'role' => array(self::BELONGS_TO, 'Roles', 'role_id'),
            // Relasi ke model MasterWilayah melalui kolom wilayah_id
            'wilayah' => array(self::BELONGS_TO, 'MasterWilayah', 'wilayah_id'),
            // Relasi ke model Doctors jika ada
            'doctor' => array(self::HAS_ONE, 'Doctors', 'user_id'),
        );
    }
  
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id'         => 'ID',
            'fullname'   => 'Nama Lengkap',
            'password'   => 'Password',
            'email'      => 'Email',
            'role_id'    => 'Role',
            'wilayah_id' => 'Wilayah',
            'created_at' => 'Dibuat',
            'updated_at' => 'Diupdate',
        );
    }
}
