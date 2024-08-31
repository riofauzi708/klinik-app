<?php

class UserController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',  // Izinkan admin untuk semua tindakan
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete'),
                'roles' => array('admin'),
            ),
            array('allow', // Izinkan user biasa untuk melihat halaman tertentu
                'actions' => array('index', 'view'),
                'roles' => array('user'),
            ),
            array('deny',  // Tolak semua pengguna yang tidak memiliki izin
                'users' => array('*'),
            ),
        );
    }

    // Action CRUD lainnya...
}
