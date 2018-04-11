<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FacultyMap;

/**
 * FacultyMapSearch represents the model behind the search form of `app\models\FacultyMap`.
 */
class FacultyMapSearch extends FacultyMap
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fac_id', 'sub_id'], 'integer'],
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
        $query = FacultyMap::find();

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
            'fac_id' => $this->fac_id,
            'sub_id' => $this->sub_id,
        ]);

        return $dataProvider;
    }
}
