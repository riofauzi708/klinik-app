<?php

// protected/models/Bill.php
class Bill extends CActiveRecord
{
    // Constants untuk status tagihan
    const STATUS_UNPAID = 'unpaid';
    const STATUS_PAID = 'paid';

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

    public function attributeLabels()
    {
        return array(
            'patient_id' => 'Patient ID',
            'amount' => 'Amount',
            'status' => 'Status',
            'payment_date' => 'Payment Date',
        );
    }

    // Relasi dengan tabel lain
    public function relations()
    {
        return array(
            'patient' => array(self::BELONGS_TO, 'Patient', 'patient_id'),
        );
    }

    // Mengambil status dalam bentuk label yang bisa digunakan di tampilan
    public function getStatusLabel()
    {
        $labels = array(
            self::STATUS_UNPAID => 'Unpaid',
            self::STATUS_PAID => 'Paid',
        );

        return isset($labels[$this->status]) ? $labels[$this->status] : 'Unknown';
    }

    // Memastikan status default jika tidak diset
    protected function beforeSave()
    {
        if ($this->isNewRecord && empty($this->status)) {
            $this->status = self::STATUS_UNPAID;
        }
        return parent::beforeSave();
    }
}
