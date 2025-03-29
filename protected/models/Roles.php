<?php

class Roles extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Roles the static model class
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
        return 'roles';
    }
  
    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            // role_name wajib diisi dan maksimal 50 karakter
            array('role_name', 'required'),
            array('role_name', 'length', 'max' => 50),
            array('role_name', 'unique'),
            // created_at dan updated_at dianggap safe
            array('created_at, updated_at', 'safe'),
        );
    }
  
    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            // Jika sudah ada tabel pivot untuk menghubungkan roles dengan users
            'users' => array(self::MANY_MANY, 'Users', 'user_roles(role_id, user_id)'),
        );
    }
  
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id'         => 'ID',
            'role_name'  => 'Nama Role',
            'created_at' => 'Dibuat',
            'updated_at' => 'Diupdate',
        );
    }
}
