<?php

namespace app\models;

use Yii;
use \app\models\base\Faculty as BaseFaculty;

/**
 * This is the model class for table "faculty".
 */
class Faculty extends BaseFaculty
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['fac_name', 'uni_id', 'course_id'], 'required'],
            [['uni_id', 'course_id'], 'integer'],
            [['fac_name'], 'string', 'max' => 100]
        ]);
    }
	
}
