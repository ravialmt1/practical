<?php

namespace app\models;

use Yii;
use \app\models\base\AtestQuestions as BaseAtestQuestions;

/**
 * This is the model class for table "atest_questions".
 */
class AtestQuestions extends BaseAtestQuestions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['atest_id', 'atest_question', 'atest_question_difficulty', 'atest_question_multianswer'], 'required'],
            [['atest_id', 'atest_question_multianswer'], 'integer'],
            [['atest_question'], 'string', 'max' => 2000],
            [['atest_question_difficulty'], 'string', 'max' => 20]
        ]);
    }
	
}
