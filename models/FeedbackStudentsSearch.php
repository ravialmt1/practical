<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FeedbackStudents;

/**
 * FeedbackStudentsSearch represents the model behind the search form of `app\models\FeedbackStudents`.
 */
class FeedbackStudentsSearch extends FeedbackStudents
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'semester', 'mobile_no'], 'integer'],
            [['university', 'student_name', 'registration_no', 'course_name', 'batch', 'email_id'], 'safe'],
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
        $query = FeedbackStudents::find();

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
            'mobile_no' => $this->mobile_no,
        ]);

        $query->andFilterWhere(['like', 'university', $this->university])
            ->andFilterWhere(['like', 'student_name', $this->student_name])
            ->andFilterWhere(['like', 'registration_no', $this->registration_no])
            ->andFilterWhere(['like', 'course_name', $this->course_name])
            ->andFilterWhere(['like', 'batch', $this->batch])
            ->andFilterWhere(['like', 'email_id', $this->email_id]);

        return $dataProvider;
    }
}
