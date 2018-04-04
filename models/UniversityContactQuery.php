<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UniversityContact]].
 *
 * @see UniversityContact
 */
class UniversityContactQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return UniversityContact[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UniversityContact|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
