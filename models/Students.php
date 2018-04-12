<?php

namespace app\models;

use Yii;
use \app\models\base\Students as BaseStudents;

/**
 * This is the model class for table "students".
 */
class Students extends BaseStudents
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['uni_id', 'course_id', 'semester'], 'integer'],
            [['course_id', 'stu_name', 'reg_no', 'semester', 'section', 'emai_id', 'mobile_no', 'laptop', 'smart_phone', 'address', 'dob', 'father_name', 'mother_name', 'parent_contact', 'caste', 'religion', 'nationality'], 'required'],
            [['address'], 'string'],
            [['stu_name', 'reg_no', 'mobile_no', 'laptop', 'smart_phone', 'dob', 'father_name', 'mother_name', 'caste', 'religion', 'nationality'], 'string', 'max' => 100],
            [['section'], 'string', 'max' => 20],
            [['emai_id'], 'string', 'max' => 200],
            [['parent_contact'], 'string', 'max' => 13]
        ]);
    }
	
}
