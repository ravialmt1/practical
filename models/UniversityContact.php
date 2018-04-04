<?php

namespace app\models;

use Yii;
use \app\models\base\UniversityContact as BaseUniversityContact;

/**
 * This is the model class for table "university_contact".
 */
class UniversityContact extends BaseUniversityContact
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['uni_id', 'coordinator', 'contact_no', 'address'], 'required'],
            [['uni_id'], 'integer'],
            [['address'], 'string'],
            [['created_at', 'updated_at', 'deleted_at','created_by', 'updated_by', 'deleted_by'], 'safe'],
            [['coordinator', 'contact_no' ], 'string', 'max' => 100]
        ]);
    }
	
}
