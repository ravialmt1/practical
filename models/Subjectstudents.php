<?php

namespace app\models;

use Yii;
use \app\models\base\Subjectstudents as BaseSubjectstudents;

/**
 * This is the model class for table "class_subject_students".
 */
class Subjectstudents extends BaseSubjectstudents
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['class_id', 'subject_id', 'student_id'], 'required'],
            [['class_id', 'subject_id', 'student_id'], 'integer']
        ]);
    }
	
}
