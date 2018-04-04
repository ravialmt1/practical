<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\LibraryCupboardShelf;

/**
 * LibraryCupboardShelfSearch represents the model behind the search form of `frontend\models\LibraryCupboardShelf`.
 */
class LibraryCupboardShelfSearch extends LibraryCupboardShelf
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'Cupboard_id', 'Capacity'], 'integer'],
            [['Details'], 'safe'],
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
        $query = LibraryCupboardShelf::find();

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
            'id' => $this->id,
            'Cupboard_id' => $this->Cupboard_id,
            'Capacity' => $this->Capacity,
        ]);

        $query->andFilterWhere(['like', 'Details', $this->Details]);

        return $dataProvider;
    }
}
