<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Motor;

/**
 * MotorSearch represents the model behind the search form of `common\models\Motor`.
 */
class MotorSearch extends Motor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_plat', 'nama_motor', 'status', 'tanggal_add', 'foto'], 'safe'],
            [['id_user'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Motor::find()->where(['id_user' => $params]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'id_plat', $this->id_plat])
            ->andFilterWhere(['like', 'nama_motor', $this->nama_motor])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'tanggal_add', $this->tanggal_add])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
