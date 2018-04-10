<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%history}}".
 *
 * @property int $id_history
 * @property string $id_plat
 * @property double $lat_awal
 * @property double $long_awal
 * @property double $lat_akhir
 * @property double $long_akhir
 * @property string $tanggal
 * @property double $jarak
 *
 * @property Motor $plat
 */
class History extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%history}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_plat', 'lat_awal', 'long_awal', 'lat_akhir', 'long_akhir', 'tanggal', 'jarak'], 'required'],
            [['lat_awal', 'long_awal', 'lat_akhir', 'long_akhir', 'jarak'], 'number'],
            [['id_plat'], 'string', 'max' => 10],
            [['tanggal'], 'string', 'max' => 100],
            [['id_plat'], 'exist', 'skipOnError' => true, 'targetClass' => Motor::className(), 'targetAttribute' => ['id_plat' => 'id_plat']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_history' => 'Id History',
            'id_plat' => 'Id Plat',
            'lat_awal' => 'Lat Awal',
            'long_awal' => 'Long Awal',
            'lat_akhir' => 'Lat Akhir',
            'long_akhir' => 'Long Akhir',
            'tanggal' => 'Tanggal',
            'jarak' => 'Jarak',
        ];
    }

    public function findByPlat($id){
        return self::findOne(['id_plat'=>$id]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlat()
    {
        return $this->hasOne(Motor::className(), ['id_plat' => 'id_plat']);
    }
}
