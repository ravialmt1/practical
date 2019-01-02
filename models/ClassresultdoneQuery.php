<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Classresultdone]].
 *
 * @see Classresultdone
 */
class ClassresultdoneQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Classresultdone[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Classresultdone|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
