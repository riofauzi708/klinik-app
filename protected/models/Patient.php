<?php

// protected/models/Patient.php
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
            array('name, address', 'required'),
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
        );
    }
}
