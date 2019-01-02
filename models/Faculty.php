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
            [['fac_name', 'uni_id', 'vertical'], 'required'],
            [['uni_id'], 'integer'],
            [['fac_name','vertical'], 'string', 'max' => 100]
        ]);
    }
	
}
