<?php

namespace app\models;

use Yii;
use \app\models\base\Studentsclass as BaseStudentsclass;

/**
 * This is the model class for table "studentsclass".
 */
class Studentsclass extends BaseStudentsclass
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['student_id', 'class_id'], 'required'],
            [['student_id', 'class_id'], 'integer']
        ]);
    }
	
}
