<?php

namespace app\models;

use Yii;
use \app\models\base\Section as BaseSection;

/**
 * This is the model class for table "section".
 */
class Section extends BaseSection
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['stu_id', 'semester', 'section', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['stu_id', 'semester', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at','vertical'], 'safe'],
            [['section'], 'string', 'max' => 10]
        ]);
    }
	
}
