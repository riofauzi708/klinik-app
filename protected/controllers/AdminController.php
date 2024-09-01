<?php

// protected/controllers/AdminController.php
class AdminController extends Controller
{
    public function actionDashboard()
    {
        // Ambil data untuk laporan grafik
        $reportData = Bill::model()->findAll();

        // Ambil data untuk informasi pembayaran pasien
        $paidBills = Bill::model()->count('status = :status', array(':status' => 'paid'));
        $unpaidBills = Bill::model()->count('status = :status', array(':status' => 'unpaid'));

        // Render view dengan data
        $this->render('dashboard', array(
            'reportData' => $reportData,
            'paidBills' => $paidBills,
            'unpaidBills' => $unpaidBills,
        ));
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
