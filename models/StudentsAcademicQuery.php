<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[StudentsAcademic]].
 *
 * @see StudentsAcademic
 */
class StudentsAcademicQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return StudentsAcademic[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return StudentsAcademic|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
