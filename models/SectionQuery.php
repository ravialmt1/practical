<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Section]].
 *
 * @see Section
 */
class SectionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Section[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Section|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
