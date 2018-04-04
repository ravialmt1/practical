<?php

namespace app\modules\students\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\students\models\StudentDetails;

/**
 * StudentDetailsSearch represents the model behind the search form of `app\modules\students\models\StudentDetails`.
 */
class StudentDetailsSearch extends StudentDetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'course_id', 'StuSem', 'StuClassTenMarks', 'StuClassTwelveMarks'], 'integer'],
            [['StuName', 'StuRegNo', 'StuGender', 'StuEmail', 'StuMobile', 'StuClassTenBoard', 'StuClassTwelveBoard', 'Stream'], 'safe'],
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
        $query = StudentDetails::find();

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
            'course_id' => $this->course_id,
            'StuSem' => $this->StuSem,
            'StuClassTenMarks' => $this->StuClassTenMarks,
            'StuClassTwelveMarks' => $this->StuClassTwelveMarks,
        ]);

        $query->andFilterWhere(['like', 'StuName', $this->StuName])
            ->andFilterWhere(['like', 'StuRegNo', $this->StuRegNo])
            ->andFilterWhere(['like', 'StuGender', $this->StuGender])
            ->andFilterWhere(['like', 'StuEmail', $this->StuEmail])
            ->andFilterWhere(['like', 'StuMobile', $this->StuMobile])
            ->andFilterWhere(['like', 'StuClassTenBoard', $this->StuClassTenBoard])
            ->andFilterWhere(['like', 'StuClassTwelveBoard', $this->StuClassTwelveBoard])
            ->andFilterWhere(['like', 'Stream', $this->Stream]);

        return $dataProvider;
    }
}
