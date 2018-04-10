<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\History;

/**
 * HistorySearch represents the model behind the search form of `common\models\History`.
 */
class HistorySearch extends History
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_history'], 'integer'],
            [['id_plat', 'tanggal'], 'safe'],
            [['lat_awal', 'long_awal', 'lat_akhir', 'long_akhir', 'jarak'], 'number'],
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
        $query = History::find();

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
            'id_history' => $this->id_history,
            'lat_awal' => $this->lat_awal,
            'long_awal' => $this->long_awal,
            'lat_akhir' => $this->lat_akhir,
            'long_akhir' => $this->long_akhir,
            'jarak' => $this->jarak,
        ]);

        $query->andFilterWhere(['like', 'id_plat', $this->id_plat])
            ->andFilterWhere(['like', 'tanggal', $this->tanggal]);

        return $dataProvider;
    }
}
