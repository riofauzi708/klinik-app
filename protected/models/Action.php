<?php
// protected/models/Action.php
class Action extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'action';
    }

    public function rules()
    {
        return array(
            array('patient_id, action_type, action_date, price', 'required'),
            array('price', 'numerical', 'min' => 0),
            array('description', 'safe'),
            array('action_date', 'date', 'format' => 'yyyy-MM-dd'),
            array('price', 'filter', 'filter' => array($this, 'formatPrice')),
        );
    }

    public function attributeLabels()
    {
        return array(
            'patient_id' => 'Patient ID',
            'action_type' => 'Action Type',
            'description' => 'Description',
            'action_date' => 'Action Date',
            'price' => 'Price',
        );
    }

    // Convert formatted price to a numeric value
    public function formatPrice($value)
    {
        // Remove currency symbols and thousands separators
        $value = preg_replace('/[^0-9.,]/', '', $value);
        $value = str_replace(',', '.', $value);
        return (float) $value;
    }

    // Save price as a number before saving
    public function beforeSave()
    {
        if (parent::beforeSave()) {
            // Ensure price is a number
            $this->price = $this->formatPrice($this->price);
            return true;
        }
        return false;
    }

    public function relations()
    {
        return array(
            'patient' => array(self::BELONGS_TO, 'Patient', 'patient_id'),
        );
    }
}



