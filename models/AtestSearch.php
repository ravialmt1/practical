<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Atest;

/**
 * AtestSearch represents the model behind the search form of `app\models\Atest`.
 */
class AtestSearch extends Atest
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['atest_id'], 'integer'],
            [['atest_name', 'atest_difficulty'], 'safe'],
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
        $query = Atest::find();

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
            'atest_id' => $this->atest_id,
        ]);

        $query->andFilterWhere(['like', 'atest_name', $this->atest_name])
            ->andFilterWhere(['like', 'atest_difficulty', $this->atest_difficulty]);

        return $dataProvider;
    }
}
