<?php

class UserIdentity extends CUserIdentity
{
	private $_id;

	public function authenticate()
	{
		// Cari user berdasarkan email
		$user = Users::model()->find('email=:email', array(':email' => $this->username));

		if ($user === null)
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		else if ($this->password != $user->password) {
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		} else {
			$this->_id = $user->id;
			// Set identifier sebagai email
			$this->username = $user->email;
			$this->errorCode = self::ERROR_NONE;
			// Simpan data tambahan ke state, misalnya role dan wilayah
			Yii::app()->user->setState('role_id', $user->role_id);
			Yii::app()->user->setState('is_active', $user->is_active);
		}
		return !$this->errorCode;
	}

	public function getId()
	{
		return $this->_id;
	}
}
