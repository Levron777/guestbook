<?php

namespace app\models;

use yii\base\Model;

class Signup extends Model
{
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'app\models\User'],
            ['password', 'string', 'min' => 3, 'max' => 6]
        ];
    }

    public function signup()
    {
        $user = new User();
        $user->email = $this->email;
        $user->hashPassword($this->password);
        return $user->save();
    }
}
