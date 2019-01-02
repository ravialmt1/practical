<?php

namespace app\models;

use Yii;
use \app\models\base\AtestQuestionAnswers as BaseAtestQuestionAnswers;

/**
 * This is the model class for table "atest_question_answers".
 */
class AtestQuestionAnswers extends BaseAtestQuestionAnswers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['atest_question_answer'], 'required'],
            [['atest_question_id', 'atest_question_answer_correct'], 'integer'],
            [['atest_question_answer'], 'string', 'max' => 300]
        ]);
    }
	
}
