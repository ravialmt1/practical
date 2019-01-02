<?php

namespace app\models;

use Yii;
use \app\models\base\Tempfile as BaseTempfile;

/**
 * This is the model class for table "temp_file".
 */
class Tempfile extends BaseTempfile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['filename'], 'required'],
            [['filename'], 'file']
        ]);
    }
	
}
