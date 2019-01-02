<?php

namespace app\models;

use Yii;
use \app\models\base\Classes as BaseClasses;

/**
 * This is the model class for table "classes".
 */
class Classes extends BaseClasses
{
    /**
     * @inheritdoc
     */
	 public $uni_id;
	 public $vertical;
	 public $subject;
	 public $att_date;
	 public $hours;
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['course_id', 'sem', 'section'], 'required'],
            [['course_id', 'sem'], 'integer'],
            [['section'], 'string', 'max' => 11]
        ]);
    }
	
}
