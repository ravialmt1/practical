<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\LibraryBooks;

/**
 * LibraryBooksSearch represents the model behind the search form of `frontend\models\LibraryBooks`.
 */
class LibraryBooksSearch extends LibraryBooks
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'Book_catogary_id', 'Cupboard_id', 'Cupboard_shelf_id', 'Copy'], 'integer'],
            [['Isbn', 'Book_name', 'Author'], 'safe'],
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
        $query = LibraryBooks::find();

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
            'Id' => $this->Id,
            'Book_catogary_id' => $this->Book_catogary_id,
            'Cupboard_id' => $this->Cupboard_id,
            'Cupboard_shelf_id' => $this->Cupboard_shelf_id,
            'Copy' => $this->Copy,
        ]);

        $query->andFilterWhere(['like', 'Isbn', $this->Isbn])
            ->andFilterWhere(['like', 'Book_name', $this->Book_name])
            ->andFilterWhere(['like', 'Author', $this->Author]);

        return $dataProvider;
    }
}
