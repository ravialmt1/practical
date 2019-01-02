<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Tempfile]].
 *
 * @see Tempfile
 */
class TempfileQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Tempfile[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tempfile|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
