<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "atest_participants".
 *
 * @property integer $atest_participant_id
 * @property integer $atest_id
 * @property string $atest_participant_time_start
 * @property string $atest_participant_time_end
 *
 * @property \app\models\AtestParticipantAnswers[] $atestParticipantAnswers
 * @property \app\models\Atest $atest
 */
class AtestParticipants extends \yii\db\ActiveRecord
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
            'atest'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['atest_id', 'atest_participant_time_start', 'atest_participant_time_end'], 'required'],
            [['atest_id'], 'integer'],
            [['atest_participant_time_start', 'atest_participant_time_end'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'atest_participants';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'atest_participant_id' => 'Atest Participant ID',
            'atest_id' => 'Atest ID',
            'atest_participant_time_start' => 'Atest Participant Time Start',
            'atest_participant_time_end' => 'Atest Participant Time End',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtestParticipantAnswers()
    {
        return $this->hasMany(\app\models\AtestParticipantAnswers::className(), ['atest_participants_id' => 'atest_participant_id']);
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
     * @return \app\models\AtestParticipantsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\AtestParticipantsQuery(get_called_class());
    }
}
