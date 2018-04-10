<?php

namespace common\models;
use Yii;
use yii\base\Model;
use common\models\User;

class UserForm extends Model{
    public $username;
    public $email;
    public $user_pin;
    public $password;
    public $create_at;
    public $auth_key;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username','email', 'password'], 'required', ],
            // [['email'], 'unique',  'message' => 'Email sudah digunakan'],
            [['user_pin'], 'integer'],
            [['auth_key'], 'string']
        ];
    }

}