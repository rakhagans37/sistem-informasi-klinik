<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha' => array(
				'class' => 'CCaptchaAction',
				'backColor' => 0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page' => array(
				'class' => 'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model = new ContactForm;
		if (isset($_POST['ContactForm'])) {
			$model->attributes = $_POST['ContactForm'];
			if ($model->validate()) {
				$name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
				$subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
				$headers = "From: $name <{$model->email}>\r\n" .
					"Reply-To: {$model->email}\r\n" .
					"MIME-Version: 1.0\r\n" .
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
				Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact', array('model' => $model));
	}

	public function actionLogin()
	{
		$model = new LoginForm;

		// Jika permintaan ajax untuk validasi form
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if (isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			if ($model->validate() && $model->login()) {
				// Ambil role dari state
				$roleId = Yii::app()->user->getState('role_id');

				// Redirect berdasarkan role
				switch ($roleId) {
					case 1:
						$this->redirect(array('/admin/index'));
						break;
					case 2:
						$this->redirect(array('/cashier/index'));
						break;
					case 3:
						$this->redirect(array('/resepcionist/index'));
						break;
					case 4:
						$this->redirect(array('/doctor/index'));
						break;
					default:
						$this->redirect(Yii::app()->user->returnUrl);
						break;
				}
			}
		}
		$this->render('login', array('model' => $model));
	}



	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionRegisterDoctor()
	{
		$model = new RegisterDoctorForm;
		if (isset($_POST['RegisterDoctorForm'])) {
			$model->attributes = $_POST['RegisterDoctorForm'];
			// Ambil file yang diupload
			$model->photo = CUploadedFile::getInstance($model, 'photo');

			if ($model->validate()) {
				$user = new Users;
				$user->fullname   = $model->fullname;
				$user->email      = $model->email;
				$user->password   = CPasswordHelper::hashPassword($model->password);
				$user->role_id    = 2;  // Role Dokter

				// Tangani file upload jika ada
				if ($model->photo !== null) {
					// Misal simpan di folder "uploads" di webroot
					$filename = uniqid() . '.' . $model->photo->extensionName;
					$uploadPath = Yii::getPathOfAlias('webroot') . '/assets/uploads/' . $filename;
					if ($model->photo->saveAs($uploadPath)) {
						$user->photo = $filename;
					}
				}

				if ($user->save()) {
					// Setelah berhasil simpan user, buat record di table doctors
					$doctor = new Doctors;
					$doctor->user_id   = $user->id;
					$doctor->specialty = $model->specialty;
					$doctor->wilayah_id = $model->wilayah_id;
					if ($doctor->save()) {
						Yii::app()->user->setFlash('success', 'Registrasi Dokter berhasil. Silakan login.');
						$this->redirect(array('site/login'));
					} else {
						Yii::app()->user->setFlash('error', 'Gagal menyimpan data dokter.');
					}
				} else {
					Yii::app()->user->setFlash('error', 'Gagal menyimpan data user.');
				}
			}
		}
		$this->render('registerDoctor', array('model' => $model));
	}

	public function actionRegister()
	{
		$model = new RegisterStaffForm;

		if (isset($_POST['RegisterStaffForm'])) {
			$model->attributes = $_POST['RegisterStaffForm'];
			// Ambil file yang diupload
			$model->photo = CUploadedFile::getInstance($model, 'photo');

			if ($model->validate()) {
				$user = new Users;
				$user->fullname   = $model->fullname;
				$user->email      = $model->email;
				$user->password   = CPasswordHelper::hashPassword($model->password);

				// Set role_id berdasarkan pilihan staff_role
				if ($model->staff_role === 'receptionist') {
					$user->role_id = 3;
				} else {
					$user->role_id = 4;
				}

				// Tangani file upload (wajib diupload karena aturan validate)
				if ($model->photo !== null) {
					$filename = uniqid() . '.' . $model->photo->extensionName;
					$uploadPath = Yii::getPathOfAlias('webroot') . '/assets/uploads/' . $filename;
					if ($model->photo->saveAs($uploadPath)) {
						$user->photo = $filename;
					} else {
						Yii::app()->user->setFlash('error', 'Gagal mengupload foto.');
						$this->render('register', array('model' => $model));
						Yii::app()->end();
					}
				}

				// Simpan user satu kali
				if ($user->save()) {
					// Berdasarkan role, simpan record tambahan di tabel terkait
					if ($model->staff_role === 'receptionist') {
						$receptionist = new Recepsionists;
						$receptionist->user_id    = $user->id;
						$receptionist->wilayah_id = $model->wilayah_id;
						$receptionist->save();
					} else {
						$cashier = new Cashiers;
						$cashier->user_id    = $user->id;
						$cashier->wilayah_id = $model->wilayah_id;
						$cashier->save();
					}

					Yii::app()->user->setFlash('success', 'Registrasi berhasil. Silakan login.');
					$this->redirect(array('site/login'));
				} else {
					Yii::app()->user->setFlash('error', 'Gagal menyimpan data user.');
				}
			}
		}

		$this->render('register', array('model' => $model));
	}
}
