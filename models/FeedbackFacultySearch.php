<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FeedbackFaculty;

/**
 * FeedbackFacultySearch represents the model behind the search form of `app\models\FeedbackFaculty`.
 */
class FeedbackFacultySearch extends FeedbackFaculty
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'feed_id'], 'integer'],
            [['faculty'], 'safe'],
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
        $query = FeedbackFaculty::find();

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
            'feed_id' => $this->feed_id,
        ]);

        $query->andFilterWhere(['like', 'faculty', $this->faculty]);

        return $dataProvider;
    }
	
}
