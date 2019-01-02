<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "atest".
 *
 * @property int $atest_id
 * @property string $atest_name
 * @property string $atest_difficulty
 *
 * @property AtestParticipantAnswers[] $atestParticipantAnswers
 * @property AtestParticipants[] $atestParticipants
 * @property AtestQuestions[] $atestQuestions
 */
class Atest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'atest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['atest_name', 'atest_difficulty'], 'required'],
            [['atest_name', 'atest_difficulty'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'atest_id' => 'Atest ID',
            'atest_name' => 'Atest Name',
            'atest_difficulty' => 'Atest Difficulty',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtestParticipantAnswers()
    {
        return $this->hasMany(AtestParticipantAnswers::className(), ['atest_id' => 'atest_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtestParticipants()
    {
        return $this->hasMany(AtestParticipants::className(), ['atest_id' => 'atest_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtestQuestions()
    {
        return $this->hasMany(AtestQuestions::className(), ['atest_id' => 'atest_id']);
    }
}
