<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tabel_user".
 *
 * @property int $id_user
 * @property string $username
 * @property string $email
 * @property string $password
 * @property int $user_pin
 * @property string $create_at
 * @property string $auth_key
 * @property string $access_token
 *
 * @property Motor[] $motors
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'create_at'], 'required'],
            [['user_pin'], 'integer'],
            [['username'], 'string', 'max' => 25],
            [['email'], 'string', 'max' => 50],
            [['password', 'auth_key', 'access_token'], 'string', 'max' => 255],
            [['create_at'], 'string', 'max' => 100],
            [['auth_key'], 'unique'],
            [['access_token'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'username' => 'Nama User',
            'email' => 'Email',
            'password' => 'Password',
            'user_pin' => 'User Pin',
            'create_at' => 'Create At',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
        ];
    }

    public function getAuthKey(){
        return $this->auth_key;
    }
    public function getId(){
        return $this->id_user;
    }
    public function validateAuthKey($authKey){
        return $this->auth_key === $authKey;
    }
    public function findByEmail($email){
        return self::findOne(['email'=>$email]);
    }
    public static function findIdentity($id){
        return self::findOne($id);
    }
    public static function findIdentityByAccessToken($token, $type = null){
        return static::findOne(['auth_key' => $token]);
        // throw new \yii\base\NotSupportedException();
    }
    public function validatePassword($password){
        return $this->password == md5($password);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMotors()
    {
        return $this->hasMany(Motor::className(), ['id_user' => 'id_user']);
    }
}
