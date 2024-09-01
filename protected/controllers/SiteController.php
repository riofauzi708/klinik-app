<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			'captcha' => array(
				'class' => 'CCaptchaAction',
				'backColor' => 0xFFFFFF,
			),
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
		if (Yii::app()->user->isGuest) {
			$this->render('home'); // Home page for guests
		} else {
			$role = Yii::app()->user->getState('role');
			if ($role === 'admin') {
				$this->redirect(array('admin/dashboard'));
			} else if ($role === 'user') {
				$this->redirect(array('user/home'));
			} else {
				$this->redirect(array('site/home')); // Default redirection if role is not found
			}
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

	/**
	 * Displays the register page
	 */
	public function actionRegister()
	{
		$model = new User('register');

		if (isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			if ($model->validate() && $model->save()) {
				$auth = Yii::app()->authManager;
				$role = $model->role;
				$auth->assign($role, $model->id); // Pastikan Anda menggunakan ID pengguna yang benar

				Yii::app()->user->setFlash('register', 'Registration successful. You can now log in.');
				$this->redirect(array('site/login'));
			}
		}

		$this->render('register', array('model' => $model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model = new LoginForm;

		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if (isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			if ($model->validate() && $model->login()) {
				$role = Yii::app()->user->getState('role');
				if ($role === 'admin') {
					$this->redirect(array('admin/dashboard'));
				} else if ($role === 'user') {
					$this->redirect(array('user/home'));
				} else {
					$this->redirect(array('site/index')); // Default redirection if role is not found
				}
			}
		}
		$this->render('login', array('model' => $model));
	}

	public function actionError()
	{
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest) {
				echo $error['message'];
			} else {
				// Default ke view 'error' jika tersedia, jika tidak ada fallback ke 'index'
				$view = Yii::app()->getViewPath() . DIRECTORY_SEPARATOR . 'site' . DIRECTORY_SEPARATOR . 'error.php';
				if (is_file($view)) {
					$this->render('error', $error);
				} else {
					$this->render('index'); // Fallback jika view 'error' tidak ada
				}
			}
		}
	}
	

	/**
	 * Logout the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	/**
	 * Setup roles and permissions
	 */
	public function actionSetupRoles()
	{
		$auth = Yii::app()->authManager;

		// Tambahkan role "admin"
		$auth->createRole('admin');

		// Tambahkan role "user"
		$auth->createRole('user');

		// Tambahkan operasi
		$auth->createOperation('createPost', 'create a post');
		$auth->createOperation('readPost', 'read a post');
		$auth->createOperation('updatePost', 'update a post');
		$auth->createOperation('deletePost', 'delete a post');

		// Tambahkan tugas
		$task = $auth->createTask('managePost', 'manage posts');
		$task->addChild('createPost');
		$task->addChild('updatePost');

		// Tambahkan operasi ke role
		$role = $auth->getAuthItem('admin');
		$role->addChild('managePost');
		$role->addChild('deletePost');

		$role = $auth->getAuthItem('user');
		$role->addChild('readPost');

		// Assign role ke user
		$auth->assign('admin', 1); // 1 adalah user_id dari admin
		$auth->assign('user', 2); // 2 adalah user_id dari user biasa
	}
}
