<?php

class TreatmentController extends Controller
{
    public function actionIndexAction()
    {
        $criteria = new CDbCriteria();
        $criteria->order = 'action_date DESC';
        $dataProvider = new CActiveDataProvider('Action', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 10,
            ),
        ));

        $this->render('indexAction', array('dataProvider' => $dataProvider));
    }

    public function actionCreateAction()
    {
        $model = new Action;

        if (isset($_POST['Action'])) {
            $model->attributes = $_POST['Action'];
            if ($model->save()) {
                $this->redirect(array('indexAction'));
            }
        }

        $patients = CHtml::listData(Patient::model()->findAll(), 'id', 'name');
        $this->render('createAction', array('model' => $model, 'patients' => $patients));
    }

    public function actionUpdateAction($id)
    {
        $model = Action::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        if (isset($_POST['Action'])) {
            $model->attributes = $_POST['Action'];
            if ($model->save()) {
                $this->redirect(array('indexAction'));
            }
        }

        $patients = CHtml::listData(Patient::model()->findAll(), 'id', 'name');
        $this->render('updateAction', array('model' => $model, 'patients' => $patients));
    }

    public function actionDeleteAction($id)
    {
        $model = Action::model()->findByPk($id);
        if ($model !== null) {
            $model->delete();
        }
        $this->redirect(array('indexAction'));
    }

    public function actionViewAction($id)
    {
        $model = Action::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        $this->render('viewAction', array('model' => $model));
    }

}
