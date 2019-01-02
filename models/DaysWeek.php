<?php

namespace app\models;

use Yii;
use \app\models\base\DaysWeek as BaseDaysWeek;

/**
 * This is the model class for table "days_week".
 */
class DaysWeek extends BaseDaysWeek
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100]
        ]);
    }
	
}
