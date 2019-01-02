<?php

namespace app\models;

use Yii;
use \app\models\base\Subjectelectivemap as BaseSubjectelectivemap;

/**
 * This is the model class for table "subjects_elective_group".
 */
class Subjectelectivemap extends BaseSubjectelectivemap
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id', 'elective_group'], 'required'],
            [['id'], 'integer'],
            [['elective_group'], 'string', 'max' => 300]
        ]);
    }
	
}
