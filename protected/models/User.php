<?php

class User extends CActiveRecord
{
    public $password_repeat; // Untuk konfirmasi password

    // Atur nama tabel yang sesuai dengan tabel di database
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'user'; // Sesuaikan dengan nama tabel di database
    }

    public function rules()
    {
        return array(
            array('username, password, password_repeat, role', 'required'),
            array('password_repeat', 'compare', 'compareAttribute' => 'password'),
            array('username', 'unique', 'message' => 'This username has already been taken.'),
            // Tambahkan aturan validasi lain jika diperlukan
        );
    }

    public function scenarios()
    {
        return array(
            'register' => array('username', 'password', 'password_repeat', 'role'),
            // Scenario lain jika diperlukan
        );
    }

    public function beforeSave()
    {
        if (parent::beforeSave()) {
            // Enkripsi password sebelum disimpan
            $this->password = CPasswordHelper::hashPassword($this->password);
            return true;
        }
        return false;
    }
    

    public function afterSave()
{
    parent::afterSave();
    $auth = Yii::app()->authManager;
    if (!$auth->isAssigned($this->role, $this->username)) {
        $auth->assign($this->role, $this->username);
    }
}

    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'password_repeat' => 'Confirm Password',
            'email' => 'Email',
        );
    }

    public static function findByUsername($username)
    {
        return self::model()->findByAttributes(array('username' => $username));
    }

    public function validatePassword($password)
    {
        return CPasswordHelper::verifyPassword($password, $this->password);
    }
}
