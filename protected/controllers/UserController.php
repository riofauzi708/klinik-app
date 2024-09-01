<?php

class UserController extends Controller
{
    public function actionHome()
    {
        $this->render('home');
    }

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('home'),
                'roles' => array('user'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }
}

