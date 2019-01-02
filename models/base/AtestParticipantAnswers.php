<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "atest_participant_answers".
 *
 * @property integer $atest_participant_answers_id
 * @property integer $atest_id
 * @property integer $atest_question_id
 * @property integer $atest_participants_id
 * @property integer $atest_question_answer_id
 * @property string $atest_question_time_start
 * @property string $atest_question_time_end
 *
 * @property \app\models\AtestQuestionAnswers $atestQuestionAnswer
 * @property \app\models\Atest $atest
 * @property \app\models\AtestParticipants $atestParticipants
 * @property \app\models\AtestQuestions $atestQuestion
 */
class AtestParticipantAnswers extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'atestQuestionAnswer',
            'atest',
            'atestParticipants',
            'atestQuestion'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['atest_id', 'atest_question_id', 'atest_participants_id', 'atest_question_answer_id', 'atest_question_time_start', 'atest_question_time_end'], 'required'],
            [['atest_id', 'atest_question_id', 'atest_participants_id', 'atest_question_answer_id'], 'integer'],
            [['atest_question_time_start', 'atest_question_time_end'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'atest_participant_answers';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'atest_participant_answers_id' => 'Atest Participant Answers ID',
            'atest_id' => 'Atest ID',
            'atest_question_id' => 'Atest Question ID',
            'atest_participants_id' => 'Atest Participants ID',
            'atest_question_answer_id' => 'Atest Question Answer ID',
            'atest_question_time_start' => 'Atest Question Time Start',
            'atest_question_time_end' => 'Atest Question Time End',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtestQuestionAnswer()
    {
        return $this->hasOne(\app\models\AtestQuestionAnswers::className(), ['atest_question_answer_id' => 'atest_question_answer_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtest()
    {
        return $this->hasOne(\app\models\Atest::className(), ['atest_id' => 'atest_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtestParticipants()
    {
        return $this->hasOne(\app\models\AtestParticipants::className(), ['atest_participant_id' => 'atest_participants_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtestQuestion()
    {
        return $this->hasOne(\app\models\AtestQuestions::className(), ['atest-question_id' => 'atest_question_id']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\AtestParticipantAnswersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\AtestParticipantAnswersQuery(get_called_class());
    }
}
