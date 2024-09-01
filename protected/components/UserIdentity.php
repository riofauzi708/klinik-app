<?php

class UserIdentity extends CUserIdentity
{
    public function authenticate()
    {
        $user = User::model()->findByAttributes(array('username' => $this->username));
        if ($user === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else if (!$user->validatePassword($this->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $this->errorCode = self::ERROR_NONE;
            Yii::app()->user->setState('role', $user->role);
        }
        return !$this->errorCode;
    }
    
}

