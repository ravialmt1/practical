<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[AtestParticipants]].
 *
 * @see AtestParticipants
 */
class AtestParticipantsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return AtestParticipants[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return AtestParticipants|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
