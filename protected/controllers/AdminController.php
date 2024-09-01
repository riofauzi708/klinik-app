<?php

class AdminController extends Controller
{
    public function actionDashboard()
    {
        $this->render('dashboard');
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
                'actions' => array('dashboard'),
                'roles' => array('admin'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }
}

