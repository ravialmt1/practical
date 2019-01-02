<?php

namespace app\models\base;

use Yii;



/**
 * This is the base model class for table "atest_questions".
 *
 * @property integer $atest_question_id
 * @property integer $atest_id
 * @property string $atest_question
 * @property string $atest_question_difficulty
 * @property integer $atest_question_multianswer
 *
 * @property \app\models\AtestParticipantAnswers[] $atestParticipantAnswers
 * @property \app\models\AtestQuestionAnswers[] $atestQuestionAnswers
 * @property \app\models\Atest $atest
 */
class AtestQuestions extends \yii\db\ActiveRecord
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
            'atestQuestionAnswers',
            'atest'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['atest_id', 'atest_question', 'atest_question_difficulty', 'atest_question_multianswer'], 'required'],
            [['atest_id', 'atest_question_multianswer'], 'integer'],
            [['atest_question'], 'string', 'max' => 2000],
            [['atest_question_difficulty'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'atest_questions';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'atest_question_id' => 'Question ID',
            'atest_id' => 'ID',
            'atest_question' => 'Question',
            'atest_question_difficulty' => 'Question Difficulty',
            'atest_question_multianswer' => 'Question Multi-Answer',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtestParticipantAnswers()
    {
        return $this->hasMany(\app\models\AtestParticipantAnswers::className(), ['atest_question_id' => 'atest_question_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtestQuestionAnswers()
    {
        return $this->hasMany(\app\models\AtestQuestionAnswers::className(), ['atest_question_id' => 'atest_question_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtest()
    {
        return $this->hasOne(\app\models\Atest::className(), ['atest_id' => 'atest_id']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\AtestQuestionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\AtestQuestionsQuery(get_called_class());
    }
}
