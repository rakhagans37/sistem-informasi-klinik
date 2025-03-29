<?php

class RegisterDoctorForm extends CFormModel
{
    public $fullname;
    public $email;
    public $password;
    public $confirmPassword;
    public $specialty;
    public $wilayah_id;
    public $photo; // Field foto

    public function rules()
    {
        return array(
            // Semua field wajib diisi, termasuk foto
            array('fullname, email, password, confirmPassword, specialty, wilayah_id, photo', 'required'),
            array('email', 'email'),
            array('fullname', 'length', 'max' => 50),
            array('email', 'length', 'max' => 100),
            array('password, confirmPassword', 'length', 'min' => 6),
            array('confirmPassword', 'compare', 'compareAttribute' => 'password', 'message' => 'Password dan Konfirmasi Password tidak cocok.'),
            array('email', 'uniqueEmail'),
            array('wilayah_id', 'numerical', 'integerOnly' => true),
            // Validasi file upload: foto harus berupa jpg, jpeg, png, atau gif dan wajib diupload
            array('photo', 'file', 'types' => 'jpg, jpeg, png, gif', 'allowEmpty' => false, 'maxSize' => 1024 * 1024 * 2, 'tooLarge' => 'Ukuran file maksimal 2MB.'),
        );
    }

    public function uniqueEmail($attribute, $params)
    {
        if (Users::model()->exists('email=:email', array(':email' => $this->email))) {
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
            'specialty'       => 'Spesialisasi',
            'wilayah_id'      => 'Wilayah',
            'photo'            => 'Foto Profil',
        );
    }
}
