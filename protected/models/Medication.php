<?php

// protected/models/Medication.php
class Medication extends CActiveRecord
{
    public $price; // Tambahkan atribut price

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
            array('patient_id, medication_name, price', 'required'), // Price wajib diisi
            array('price', 'numerical', 'min' => 0), // Validasi numerik untuk price
            array('medication_date', 'date', 'format'=>'yyyy-MM-dd'),
            array('dosage, medication_date', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'medication_name' => 'Medication Name',
            'dosage' => 'Dosage',
            'medication_date' => 'Medication Date',
            'price' => 'Price', // Tambahkan label untuk price
        );
    }

    // Convert formatted price to a numeric value
    public function formatPrice($value)
    {
        $value = preg_replace('/[^0-9.,]/', '', $value);
        $value = str_replace(',', '.', $value);
        return (float) $value;
    }

    // Save price as a number before saving
    public function beforeSave()
    {
        if (parent::beforeSave()) {
            $this->price = $this->formatPrice($this->price);
            return true;
        }
        return false;
    }
}
