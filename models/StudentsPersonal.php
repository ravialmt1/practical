<?php

namespace app\models;

use Yii;
use \app\models\base\StudentsPersonal as BaseStudentsPersonal;

/**
 * This is the model class for table "students_personal".
 */
class StudentsPersonal extends BaseStudentsPersonal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['stu_id', 'laptop', 'smart_phone', 'Address', 'city', 'dob', 'father_name', 'mother_name', 'parent_contact', 'caste', 'religion', 'nationality'], 'required'],
            [['stu_id'], 'integer'],
            [['Address'], 'string'],
            [['laptop', 'smart_phone', 'father_name', 'mother_name', 'nationality'], 'string', 'max' => 300],
            [['city', 'caste', 'religion'], 'string', 'max' => 200],
            [['dob'], 'string', 'max' => 12],
            [['parent_contact'], 'string', 'max' => 13]
        ]);
    }
	
}
