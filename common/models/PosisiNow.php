<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%posisi_now}}".
 *
 * @property string $id_plat
 * @property double $lat
 * @property double $longi
 * @property string $nama_posisi
 *
 * @property Motor $plat
 */
class PosisiNow extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%posisi_now}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_plat', 'lat', 'longi', 'nama_posisi'], 'required'],
            [['lat', 'longi'], 'number'],
            [['id_plat'], 'string', 'max' => 10],
            [['nama_posisi'], 'string', 'max' => 50],
            [['id_plat'], 'exist', 'skipOnError' => true, 'targetClass' => Motor::className(), 'targetAttribute' => ['id_plat' => 'id_plat']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_plat' => 'Id Plat',
            'lat' => 'Latitude',
            'longi' => 'Longitude',
            'nama_posisi' => 'Lokasi Motor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMotor()
    {
        return $this->hasOne(Motor::className(), ['id_plat' => 'id_plat']);
    }

    public function getDistance($lat_a, $long_a, $lat_b, $long_b){
        $lat    = $lat_a - $lat_b;
        $long   = $long_a - $long_b;
        // $result1 = abs($lat*$lat - $long*$long);
        $result = sqrt(abs($lat*$lat - $long*$long));
        $distance = floor($result);
        
        return $distance;

    }
}
