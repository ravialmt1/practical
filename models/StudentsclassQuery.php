<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Studentsclass]].
 *
 * @see Studentsclass
 */
class StudentsclassQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Studentsclass[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Studentsclass|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
