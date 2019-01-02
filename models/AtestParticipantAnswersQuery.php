<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[AtestParticipantAnswers]].
 *
 * @see AtestParticipantAnswers
 */
class AtestParticipantAnswersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return AtestParticipantAnswers[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return AtestParticipantAnswers|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
