// protected/controllers/BillController.php

<?php
class BillController extends Controller
{
    public function actionPembayaran()
    {
        $model = new Bill;

        if (isset($_POST['Bill'])) {
            $model->attributes = $_POST['Bill'];
            $model->payment_date = new CDbExpression('NOW()');
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        // Pastikan untuk mengirim $model ke view
        $this->render('pembayaran', array('model' => $model));
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
                'actions' => array('pembayaran', 'create', 'view', 'update', 'index'),
                'roles' => array('admin', 'user'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new Bill;

        if (isset($_POST['Bill'])) {
            $model->attributes = $_POST['Bill'];
            $model->payment_date = new CDbExpression('NOW()');
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array('model' => $model));
    }

    public function actionView($id)
    {
        $model = $this->loadModel($id);
        $this->render('view', array('model' => $model));
    }

    public function loadModel($id)
    {
        $model = Bill::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }

    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Bill', array(
            'criteria' => array(
                'condition' => 'status = :status',
                'params' => array(':status' => 'unpaid'),
            ),
        ));

        $this->render('index', array('dataProvider' => $dataProvider));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        if ($model->status === 'unpaid') {
            $model->status = 'paid';
            $model->payment_date = new CDbExpression('NOW()');

            if ($model->save()) {
                $this->redirect(array('index'));
            }
        }
    }
}
