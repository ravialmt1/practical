<?php

namespace app\models;

use Yii;
use \app\models\base\AttendanceBell as BaseAttendanceBell;

/**
 * This is the model class for table "attendance_bell".
 */
class AttendanceBell extends BaseAttendanceBell
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['university_id', 'course_id', 'time_start', 'time_end'], 'required'],
            [['university_id', 'course_id'], 'integer'],
            [['time_start', 'time_end'], 'string', 'max' => 100],
			[['bellTime'], 'safe'],
        ]);
    }
	
}
