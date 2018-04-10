<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%motor}}".
 *
 * @property string $id_plat
 * @property int $id_user
 * @property string $nama_motor
 * @property string $status
 * @property string $tanggal_add
 * @property string $foto
 *
 * @property History[] $histories
 * @property User $user
 * @property PosisiNow[] $posisiNows
 */
class Motor extends \yii\db\ActiveRecord
{
    public $imageFile;  
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%motor}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_plat', 'id_user', 'nama_motor', 'status', 'tanggal_add'], 'required'],
            [['id_user'], 'integer'],
            [['id_plat'], 'string', 'max' => 10],
            [['nama_motor'], 'string', 'max' => 30],
            [['status'], 'string', 'max' => 1],
            [['tanggal_add', 'foto'], 'string', 'max' => 100],
            [['id_plat'], 'unique'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],            
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_plat' => 'Id Plat',
            'id_user' => 'Id User',
            'nama_motor' => 'Nama Motor',
            'status' => 'Status',
            'tanggal_add' => 'Tanggal ditambahkan',
            'foto' => 'Foto',
        ];
    }
    public function beforeSave($insert)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tmp = date('dmYHis');
        if (!parent::beforeSave($insert)) {
            return false;
        }
        if($this->imageFile != null) {
            $this->imageFile->saveAs('uploads/' .$tmp. '.' . $this->imageFile->extension);
            $this->foto = 'http://192.168.8.100/MotoSpark-Services/api/web/uploads/'.$tmp. '.' . $this->imageFile->extension;
        }
        return true;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistories()
    {
        return $this->hasMany(History::className(), ['id_plat' => 'id_plat']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id_user' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosisiNows()
    {
        return $this->hasMany(PosisiNow::className(), ['id_plat' => 'id_plat']);
    }

    public function findById($id){
        return self::findOne(['id_plat'=>$id]);
    }

}
