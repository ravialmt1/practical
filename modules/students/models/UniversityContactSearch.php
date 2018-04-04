<?php

namespace app\modules\students\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\students\models\UniversityContact;

/**
 * UniversityContactSearch represents the model behind the search form of `app\modules\students\models\UniversityContact`.
 */
class UniversityContactSearch extends UniversityContact
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uni_contact_id', 'uni_id'], 'integer'],
            [['coordinator', 'contact_no', 'address'], 'safe'],
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
        $query = UniversityContact::find();

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
            'uni_contact_id' => $this->uni_contact_id,
            'uni_id' => $this->uni_id,
        ]);

        $query->andFilterWhere(['like', 'coordinator', $this->coordinator])
            ->andFilterWhere(['like', 'contact_no', $this->contact_no])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
