<?php

class UserIdentity extends CUserIdentity
{
	private $_id;

	public function authenticate()
	{
		// Cari user berdasarkan username atau email (sesuaikan dengan kolom pada tabel Users)
		$user = Users::model()->find('fullname=:identifier OR email=:identifier', array(':identifier' => $this->username));

		if ($user === null)
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		// Misalnya, kita menggunakan CPasswordHelper untuk memverifikasi password yang di-hash
		else if (!CPasswordHelper::verifyPassword($this->password, $user->password))
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		else {
			$this->_id = $user->id;
			// Set username menjadi fullname atau yang diinginkan
			$this->username = $user->fullname;
			$this->errorCode = self::ERROR_NONE;
			// Simpan data tambahan ke dalam state, misalnya role dan wilayah
			Yii::app()->user->setState('role_id', $user->role_id);
			Yii::app()->user->setState('wilayah_id', $user->wilayah_id);
		}
		return !$this->errorCode;
	}

	public function getId()
	{
		return $this->_id;
	}
}
