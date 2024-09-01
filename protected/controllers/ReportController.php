<?php

// protected/controllers/ReportController.php
class ReportController extends Controller
{

    public function actionGrafik()
    {
        // Generate report data
        $reportData = Bill::model()->findAll(); // Fetch all bills

        // Render view with data
        $this->render('grafik', array('reportData' => $reportData));
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
                'actions' => array('grafik'),
                'roles' => array('admin', 'user'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex()
    {
        // Ambil semua data dari tabel 'bill'
        $reportData = Bill::model()->findAll();
    
        // Kirim data ke view
        $this->render('index', array('reportData' => $reportData));
    }
}
