<?php

namespace app\models;

use Yii;
use \app\models\base\Attendance as BaseAttendance;

/**
 * This is the model class for table "attendance".
 */
class Attendance extends BaseAttendance
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['student_id', 'teacher_id', 'section_id', 'subject_id', 'bell_id', 'att_status'], 'required'],
            [['student_id', 'teacher_id', 'section_id', 'subject_id', 'bell_id', 'att_status'], 'integer'],
            [['att_date'], 'safe']
        ]);
    }
	
}
