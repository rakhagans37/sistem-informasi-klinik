<?php

class RegisterStaffForm extends CFormModel
{
    public $fullname;
    public $email;
    public $password;
    public $confirmPassword;
    public $wilayah_id;
    public $photo; // File upload
    public $staff_role; // Pilihan: 'receptionist' atau 'cashier'

    public function rules()
    {
        return array(
            array('fullname, email, password, confirmPassword, wilayah_id, staff_role, photo', 'required'),
            array('email', 'email'),
            array('fullname', 'length', 'max'=>50),
            array('email', 'length', 'max'=>100),
            array('password, confirmPassword', 'length', 'min'=>6),
            array('confirmPassword', 'compare', 'compareAttribute'=>'password', 'message'=>'Password dan Konfirmasi Password tidak cocok.'),
            array('email', 'uniqueEmail'),
            array('wilayah_id', 'numerical', 'integerOnly'=>true),
            // Validator file untuk photo (wajib diupload)
            array('photo', 'file', 'types'=>'jpg, jpeg, png, gif', 'allowEmpty'=>false, 'maxSize'=>1024*1024*2, 'tooLarge'=>'Ukuran file maksimal 2MB.'),
            // Validasi staff_role: hanya boleh receptionist atau cashier
            array('staff_role', 'in', 'range'=>array('receptionist','cashier')),
        );
    }

    public function uniqueEmail($attribute, $params)
    {
        if(Users::model()->exists('email=:email', array(':email'=>$this->email))) {
            $this->addError('email', 'Email sudah terdaftar.');
        }
    }

    public function attributeLabels()
    {
        return array(
            'fullname'        => 'Nama Lengkap',
            'email'           => 'Email',
            'password'        => 'Password',
            'confirmPassword' => 'Konfirmasi Password',
            'wilayah_id'      => 'Wilayah',
            'photo'            => 'Foto Profil',
            'staff_role'      => 'Daftar Sebagai', // Label untuk radio button
        );
    }
}
