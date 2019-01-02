<?php

namespace app\models;

use Yii;
use \app\models\base\Classfees as BaseClassfees;

/**
 * This is the model class for table "class_fees".
 */
class Classfees extends BaseClassfees
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['class_id', 'classstudent_id', 'amount', 'particulars', 'feesdate'], 'required'],
            [['class_id', 'classstudent_id', 'amount'], 'integer'],
            [['feesdate'], 'safe'],
            [['particulars'], 'string', 'max' => 300]
        ]);
    }
	
}
