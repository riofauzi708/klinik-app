<?php

class Patient extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'patient';
    }

    public function rules()
    {
        return array(
            array('name, address, registration_date', 'required'),
            array('phone, email', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'name' => 'Name',
            'address' => 'Address',
            'phone' => 'Phone',
            'email' => 'Email',
            'registration_date' => 'Registration Date',
        );
    }

    public function relations()
    {
        return array(
            'actions' => array(self::HAS_MANY, 'Action', 'patient_id'),
            'medications' => array(self::HAS_MANY, 'Medication', 'patient_id'),
            'bills' => array(self::HAS_MANY, 'Bill', 'patient_id'),
        );
    }
}
