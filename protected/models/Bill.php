<?php

class Bill extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'bill';
    }

    public function rules()
    {
        return array(
            array('patient_id, amount', 'required'),
            array('status, payment_date', 'safe'),
        );
    }

    public function relations()
    {
        return array(
            'patient' => array(self::BELONGS_TO, 'Patient', 'patient_id'),
            'actions' => array(self::HAS_MANY, 'Action', 'patient_id'),
            'medications' => array(self::HAS_MANY, 'Medication', 'patient_id'),
        );
    }
}
