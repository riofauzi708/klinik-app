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
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
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
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
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
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the register page
	 */
	public function actionRegister()
    {
        $model = new User('register'); // Pastikan model User memiliki scenario 'register'

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->validate() && $model->save()) {
                // Assign default role (user) after registration
                $auth = Yii::app()->authManager;
                $auth->assign('user', $model->id);

                // Redirect to login page
                $this->redirect(array('login'));
            }
        }

        $this->render('register', array('model' => $model));
    }

    public function actionLogin()
    {
        $model = new LoginForm();

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate() && $model->login()) {
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }

        $this->render('login', array('model' => $model));
    }

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

        // Hapus semua role dan permission yang ada (opsional)
        $auth->clearAll();

        // Tambahkan role admin
        if (!$auth->getAuthItem('admin')) {
            $auth->createRole('admin', 'Administrator role');
        }

        // Tambahkan role user
        if (!$auth->getAuthItem('user')) {
            $auth->createRole('user', 'Regular user role');
        }

        // Tambahkan permission untuk mengelola pengguna
        if (!$auth->getAuthItem('manageUsers')) {
            $auth->createTask('manageUsers', 'Manage users');
        }

        // Tetapkan permission manageUsers ke admin
        if (!$auth->isAssigned('admin', 1)) { // 1 adalah user ID untuk admin
            $auth->assign('admin', 1);
        }

        // Tetapkan role user ke pengguna biasa
        if (!$auth->isAssigned('user', 2)) { // 2 adalah user ID untuk pengguna biasa
            $auth->assign('user', 2);
        }

        echo "Roles and permissions have been set up successfully.";
    }


}