<?php

namespace app\models;

use Yii;
use \app\models\base\Timetable as BaseTimetable;

/**
 * This is the model class for table "timetable".
 */
class Timetable extends BaseTimetable
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['uni_id', 'course_id', 'sem', 'section_id', 'bell_id', 'day_id', 'subject_id'], 'required'],
            [['uni_id', 'course_id', 'sem',  'bell_id', 'day_id', 'subject_id'], 'integer']
        ]);
    }
	
}
