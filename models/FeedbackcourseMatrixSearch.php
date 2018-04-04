<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FeedbackcourseMatrix;

/**
 * FeedbackcourseMatrixSearch represents the model behind the search form of `app\models\FeedbackcourseMatrix`.
 */
class FeedbackcourseMatrixSearch extends FeedbackcourseMatrix
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'semester'], 'integer'],
            [['university', 'course_name', 'batch', 'subject_code', 'category', 'subject'], 'safe'],
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
        $query = FeedbackcourseMatrix::find();

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
            'semester' => $this->semester,
        ]);

        $query->andFilterWhere(['like', 'university', $this->university])
            ->andFilterWhere(['like', 'course_name', $this->course_name])
            ->andFilterWhere(['like', 'batch', $this->batch])
            ->andFilterWhere(['like', 'subject_code', $this->subject_code])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'subject', $this->subject]);

        return $dataProvider;
    }
}
