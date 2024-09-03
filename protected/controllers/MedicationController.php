<?php

// protected/controllers/MedicationController.php
class MedicationController extends Controller
{
    public function actionIndex()
    {
        $criteria = new CDbCriteria();
        $dataProvider = new CActiveDataProvider('Medication', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 10, // Sesuaikan ukuran halaman sesuai kebutuhan
            ),
        ));

        $this->render('index', array('dataProvider' => $dataProvider));
    }

    public function actionCreate()
    {
        $model = new Medication;

        // Ambil daftar pasien dari database
        $patients = CHtml::listData(Patient::model()->findAll(), 'id', 'name');

        if (isset($_POST['Medication'])) {
            $model->attributes = $_POST['Medication'];
            if ($model->save()) {
                $this->redirect(array('index'));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'patients' => $patients, // Kirim daftar pasien ke view
        ));
    }

    public function actionView($id)
    {
        $model = Medication::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        $this->render('view', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = Medication::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        // Ambil daftar pasien dari database
        $patients = CHtml::listData(Patient::model()->findAll(), 'id', 'name');

        if (isset($_POST['Medication'])) {
            $model->attributes = $_POST['Medication'];
            if ($model->save()) {
                $this->redirect(array('index'));
            }
        }

        $this->render('update', array(
            'model' => $model,
            'patients' => $patients, // Kirim daftar pasien ke view
        ));
    }

    public function actionDelete($id)
    {
        $model = Medication::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        $model->delete();
        $this->redirect(array('index'));
    }

    public function beforeSave()
{
    if (parent::beforeSave()) {
        // Menghapus format harga dan mengubahnya menjadi float
        $this->price = $this->formatPrice($this->price);
        return true;
    }
    return false;
}

}
