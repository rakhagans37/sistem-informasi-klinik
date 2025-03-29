<?php

class Appointments extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Appointments the static model class
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
        return 'appointments';
    }

    public function beforeValidate()
    {
        if (empty($this->status)) {
            $this->status = 'pending';
        }
        return parent::beforeValidate();
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('pasien_id, doctor_id, status', 'required'),
            array('pasien_id, doctor_id', 'numerical', 'integerOnly' => true),
            array('status', 'length', 'max' => 20),
            array('notes', 'safe'),
            array('created_at, updated_at', 'safe'),
            // Rules for search
            array('id, pasien_id, doctor_id, status, notes, created_at, updated_at', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            // Relasi ke model Pasien (pastikan model Pasien sudah ada)
            'pasien' => array(self::BELONGS_TO, 'Pasien', 'pasien_id'),
            // Relasi ke model Doctors (pastikan model Doctors sudah ada)
            'doctor' => array(self::BELONGS_TO, 'Doctors', 'doctor_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label).
     */
    public function attributeLabels()
    {
        return array(
            'id'         => 'ID',
            'pasien_id'  => 'Pasien',
            'doctor_id'  => 'Dokter',
            'status'     => 'Status',
            'notes'      => 'Catatan',
            'created_at' => 'Dibuat',
            'updated_at' => 'Diupdate',
        );
    }
}
