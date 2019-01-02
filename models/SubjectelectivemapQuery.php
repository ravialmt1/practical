<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Subjectelectivemap]].
 *
 * @see Subjectelectivemap
 */
class SubjectelectivemapQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Subjectelectivemap[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Subjectelectivemap|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
