<?php

// protected/models/Medication.php
class Medication extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'medication';
    }

    public function rules()
    {
        return array(
            array('patient_id, medication_name', 'required'),
            array('dosage, medication_date', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'medication_name' => 'Medication Name',
            'dosage' => 'Dosage',
            'medication_date' => 'Medication Date',
        );
    }
}
