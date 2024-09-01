<?php

// protected/controllers/TreatmentController.php
class TreatmentController extends Controller
{
    public function actionCreateAction()
    {
        $model = new Action;

        if (isset($_POST['Action'])) {
            $model->attributes = $_POST['Action'];
            if ($model->save()) {
                $this->redirect(array('viewAction', 'id' => $model->id));
            }
        }

        $this->render('createAction', array('model' => $model));
    }

    public function actionCreateMedication()
    {
        $model = new Medication;

        if (isset($_POST['Medication'])) {
            $model->attributes = $_POST['Medication'];
            if ($model->save()) {
                $this->redirect(array('viewMedication', 'id' => $model->id));
            }
        }

        $this->render('createMedication', array('model' => $model));
    }

    public function actionViewAction($id)
    {
        $model = Action::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        $this->render('viewAction', array('model' => $model));
    }

    public function actionViewMedication($id)
    {
        $model = Medication::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        $this->render('viewMedication', array('model' => $model));
    }
}

