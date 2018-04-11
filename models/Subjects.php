<?php

namespace app\models;

use Yii;
use \app\models\base\Subjects as BaseSubjects;

/**
 * This is the model class for table "subjects".
 */
class Subjects extends BaseSubjects
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['university_id', 'course_id', 'sem', 'sub_name'], 'required'],
            [['university_id', 'course_id', 'sem'], 'integer'],
            [['sub_name'], 'string', 'max' => 100]
        ]);
    }
	
}
