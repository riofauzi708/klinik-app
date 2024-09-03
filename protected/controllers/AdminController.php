<?php

class AdminController extends Controller
{
    public function actionIndex()
    {
        // Fetch report data directly
        $command = Yii::app()->db->createCommand()
            ->select('DATE(registration_date) as report_date, COUNT(*) as count')
            ->from('patient')
            ->group('DATE(registration_date)')
            ->order('DATE(registration_date) DESC')
            ->queryAll();

        // Render the admin dashboard with report data
        $this->render('dashboard', array('reportData' => $command));
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
                'actions' => array('index'),
                'roles' => array('admin'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }
}
