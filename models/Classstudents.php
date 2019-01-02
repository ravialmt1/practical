<?php

namespace app\models;

use Yii;
use \app\models\base\Classstudents as BaseClassstudents;

/**
 * This is the model class for table "class_students".
 */
class Classstudents extends BaseClassstudents
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['class_id', 'student_name', 'regno'], 'required'],
            [['class_id'], 'integer'],
            [['student_name'], 'string', 'max' => 200],
            [['regno'], 'string', 'max' => 30]
        ]);
    }
	
}
