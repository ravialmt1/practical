<?php

namespace app\models;

use Yii;
use \app\models\base\Course as BaseCourse;

/**
 * This is the model class for table "course".
 */
class Course extends BaseCourse
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['uni_id', 'vertical', 'course_name', 'course_short_name', 'course_batch', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'], 'required'],
            [['uni_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['vertical', 'course_batch'], 'string', 'max' => 200],
            [['course_name'], 'string', 'max' => 110],
            [['course_short_name'], 'string', 'max' => 100]
        ]);
    }
	
}
