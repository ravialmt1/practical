<?php

namespace app\models;

use Yii;
use \app\models\base\Classresultdone as BaseClassresultdone;

/**
 * This is the model class for table "class_result_done".
 */
class Classresultdone extends BaseClassresultdone
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['result_fetched'], 'required'],
            [['result_fetched'], 'integer']
        ]);
    }
	
}
