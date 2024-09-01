<?php

class PatientController extends Controller
{
    public function actionPendaftaran()
    {
        // Create a new patient model for the form
        $model = new Patient;

        // Prepare the search functionality
        $criteria = new CDbCriteria;
        
        // Handle search functionality
        if (isset($_GET['search'])) {
            $criteria->compare('name', $_GET['search'], true);
        }

        // Provide dataProvider for the list
        $dataProvider = new CActiveDataProvider('Patient', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 10, // Adjust page size as needed
            ),
        ));

        // Handle form submission for creating a new patient
        if (isset($_POST['Patient'])) {
            $model->attributes = $_POST['Patient'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Pendaftaran berhasil.');
                $this->redirect(array('pendaftaran'));
            }
        }

        // Render the view with the model and dataProvider
        $this->render('pendaftaran', array(
            'model' => $model,
            'dataProvider' => $dataProvider,
        ));
    }

    public function accessRules()
{
    return array(
        array('allow',
            'actions' => array('pendaftaran', 'view', 'index'),
            'roles' => array('admin', 'user'),
        ),
        array('allow',
            'actions' => array('update', 'delete'),
            'roles' => array('admin'),
        ),
        array('deny',
            'users' => array('*'),
        ),
    );
}


public function actionIndex()
{
    $criteria = new CDbCriteria;

    if (isset($_GET['search'])) {
        $criteria->compare('name', $_GET['search'], true);
    }

    $dataProvider = new CActiveDataProvider('Patient', array(
        'criteria' => $criteria,
        'pagination' => array(
            'pageSize' => 10,
        ),
    ));

    $this->render('index', array(
        'dataProvider' => $dataProvider,
    ));
}


    public function actionView($id)
    {
        $model = $this->loadModel($id);

        $dataProvider = new CActiveDataProvider('Patient', array(
            'pagination' => array(
                'pageSize' => 10,
            ),
        ));

        $this->render('view', array(
            'model' => $model,
            'dataProvider' => $dataProvider,
        ));
    }

    public function loadModel($id)
{
    $model = Patient::model()->findByPk($id);
    if ($model === null) {
        throw new CHttpException(404, 'The requested page does not exist.');
    }
    return $model;
}


    public function actionUpdate($id)
{
    $model = $this->loadModel($id);

    if (isset($_POST['Patient'])) {
        $model->attributes = $_POST['Patient'];
        if ($model->save()) {
            Yii::app()->user->setFlash('success', 'Patient updated successfully.');
            $this->redirect(array('view', 'id' => $model->id));
        }
    }

    $this->render('update', array(
        'model' => $model,
    ));
}

public function actionDelete($id)
{
    if (Yii::app()->request->isPostRequest) {
        $this->loadModel($id)->delete();

        if (!isset($_GET['ajax'])) {
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
    } else {
        throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }
}



}
