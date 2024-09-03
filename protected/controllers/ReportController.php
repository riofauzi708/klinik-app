<?php
class ReportController extends Controller
{
    public function actionGrafik()
    {
        // Fetch data for the report
        $command = Yii::app()->db->createCommand()
            ->select('DATE(registration_date) as report_date, COUNT(*) as count')
            ->from('patient')
            ->group('DATE(registration_date)')
            ->order('DATE(registration_date) DESC')
            ->queryAll();

        // Ensure data is correctly formatted
        if ($command === false || empty($command)) {
            Yii::log('No data found for report.', CLogger::LEVEL_ERROR);
            $command = [];
        }

        // Render view with data
        $this->render('grafik', array('reportData' => $command));
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
}
