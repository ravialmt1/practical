<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "atest_question_answers".
 *
 * @property integer $atest_question_answer_id
 * @property integer $atest_question_id
 * @property string $atest_question_answer
 * @property integer $atest_question_answer_correct
 *
 * @property \app\models\AtestParticipantAnswers[] $atestParticipantAnswers
 * @property \app\models\AtestQuestions $atestQuestion
 */
class AtestQuestionAnswers extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'atestParticipantAnswers',
            'atestQuestion'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['atest_question_answer'], 'required'],
            [['atest_question_id', 'atest_question_answer_correct'], 'integer'],
            [['atest_question_answer'], 'string', 'max' => 300]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'atest_question_answers';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'atest_question_answer_id' => 'Atest Question Answer ID',
            'atest_question_id' => 'Atest Question ID',
            'atest_question_answer' => 'Atest Question Answer',
            'atest_question_answer_correct' => 'Atest Question Answer Correct',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtestParticipantAnswers()
    {
        return $this->hasMany(\app\models\AtestParticipantAnswers::className(), ['atest_question_answer_id' => 'atest_question_answer_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtestQuestion()
    {
        return $this->hasOne(\app\models\AtestQuestions::className(), ['atest_question_id' => 'atest_question_id']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\AtestQuestionAnswersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\AtestQuestionAnswersQuery(get_called_class());
    }
}
