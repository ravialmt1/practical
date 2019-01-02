<?php

namespace app\models;

use Yii;
use \app\models\base\Classresult as BaseClassresult;

/**
 * This is the model class for table "class_result".
 */
class Classresult extends BaseClassresult
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['class_id', 'reg_no', 'Name', 'subject', 'internal', 'university_marks', 'practical', 'total', 'credits', 'grade'], 'required'],
            [['class_id'], 'integer'],
            [['reg_no'], 'string', 'max' => 20],
            [['Name'], 'string', 'max' => 100],
            [['subject'], 'string', 'max' => 200],
            [['internal', 'university_marks', 'practical', 'total', 'credits', 'grade'], 'string', 'max' => 3]
        ]);
    }
	
}
