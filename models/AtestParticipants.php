<?php

namespace app\models;

use Yii;
use \app\models\base\AtestParticipants as BaseAtestParticipants;

/**
 * This is the model class for table "atest_participants".
 */
class AtestParticipants extends BaseAtestParticipants
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['atest_id', 'atest_participant_time_start', 'atest_participant_time_end'], 'required'],
            [['atest_id'], 'integer'],
            [['atest_participant_time_start', 'atest_participant_time_end'], 'safe']
        ]);
    }
	
}
