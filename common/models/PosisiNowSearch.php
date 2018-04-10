<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PosisiNow;

/**
 * PosisiNowSearch represents the model behind the search form of `common\models\PosisiNow`.
 */
class PosisiNowSearch extends PosisiNow
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_plat', 'nama_posisi'], 'safe'],
            [['lat', 'longi'], 'number'],
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
        $query = PosisiNow::find();

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
            'lat' => $this->lat,
            'longi' => $this->longi,
        ]);

        $query->andFilterWhere(['like', 'id_plat', $this->id_plat])
            ->andFilterWhere(['like', 'nama_posisi', $this->nama_posisi]);

        return $dataProvider;
    }
}
