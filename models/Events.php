<?php

namespace app\models;

use Yii;
use \app\models\base\Events as BaseEvents;

/**
 * This is the model class for table "events".
 */
class Events extends BaseEvents
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['title', 'description'], 'required'],
            [['created_at'], 'required'],
            [['title', 'created_by'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 200]
        ]);
    }
	
}
