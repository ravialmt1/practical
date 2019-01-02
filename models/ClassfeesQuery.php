<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Classfees]].
 *
 * @see Classfees
 */
class ClassfeesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Classfees[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Classfees|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
