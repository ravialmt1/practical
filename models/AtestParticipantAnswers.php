<?php

namespace app\models;

use Yii;
use \app\models\base\AtestParticipantAnswers as BaseAtestParticipantAnswers;

/**
 * This is the model class for table "atest_participant_answers".
 */
class AtestParticipantAnswers extends BaseAtestParticipantAnswers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['atest_id', 'atest_question_id', 'atest_participants_id', 'atest_question_answer_id', 'atest_question_time_start', 'atest_question_time_end'], 'required'],
            [['atest_id', 'atest_question_id', 'atest_participants_id', 'atest_question_answer_id'], 'integer'],
            [['atest_question_time_start', 'atest_question_time_end'], 'safe']
        ]);
    }
	
}
