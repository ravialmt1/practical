<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\FeedbackQuestions;

/**
 * FeedbackQuestionsSearch represents the model behind the search form of `frontend\models\FeedbackQuestions`.
 */
class FeedbackQuestionsSearch extends FeedbackQuestions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['q_id'], 'integer'],
            [['ques', 'one_word'], 'safe'],
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
        $query = FeedbackQuestions::find();

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
            'q_id' => $this->q_id,
        ]);

        $query->andFilterWhere(['like', 'ques', $this->ques])
            ->andFilterWhere(['like', 'one_word', $this->one_word]);

        return $dataProvider;
    }
}
