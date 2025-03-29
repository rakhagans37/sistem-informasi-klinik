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

			/// Jika bukan admin maka simpan wilayah_id
			if ($user->role_id != 1) {
				// Cari wilayah_id berdasarkan role_id
				if ($user->role_id == 2) {
					$doctor = Doctors::model()->find('user_id=:user_id', array(':user_id' => $user->id));
					if ($doctor !== null) {
						Yii::app()->user->setState('wilayah_id', $doctor->wilayah_id);
						Yii::app()->user->setState('doctor_id', $doctor->id);
					}
				} elseif ($user->role_id == 3) {
					$receptionist = Recepsionists::model()->find('user_id=:user_id', array(':user_id' => $user->id));
					if ($receptionist !== null) {
						Yii::app()->user->setState('wilayah_id', $receptionist->wilayah_id);
					}
				} elseif ($user->role_id == 4) {
					$cashier = Cashiers::model()->find('user_id=:user_id', array(':user_id' => $user->id));
					if ($cashier !== null) {
						Yii::app()->user->setState('wilayah_id', $cashier->wilayah_id);
					}
				}
			}
		}
		return !$this->errorCode;
	}

	public function getId()
	{
		return $this->_id;
	}
}
