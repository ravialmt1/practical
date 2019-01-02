<?php

namespace app\models;

use Yii;
use \app\models\base\StudentsAcademic as BaseStudentsAcademic;

/**
 * This is the model class for table "students_academic".
 */
class StudentsAcademic extends BaseStudentsAcademic
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['stu_id', 'class10_marks', 'class10_board', 'class12_marks', 'class12_board', 'class12_stream', 'ug_perc', 'ug_stream', 'ug_university', 'sem1_perc', 'sem2_perc', 'sem3_perc', 'sem4_perc', 'sem5_perc', 'sem6_perc', 'sem7_perc', 'sem8_perc', 'sem9_perc', 'sem10_perc'], 'required'],
            [['stu_id'], 'integer'],
            [['class10_marks', 'class12_marks', 'ug_perc', 'sem1_perc', 'sem2_perc', 'sem3_perc', 'sem4_perc', 'sem5_perc', 'sem6_perc', 'sem7_perc', 'sem8_perc', 'sem9_perc', 'sem10_perc'], 'string', 'max' => 100],
            [['class10_board', 'class12_board', 'class12_stream', 'ug_stream', 'ug_university'], 'string', 'max' => 300]
        ]);
    }
	
}
