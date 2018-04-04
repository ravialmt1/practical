<?php

namespace app\modules\students\models;

use Yii;

/**
 * This is the model class for table "university_contact".
 *
 * @property int $uni_contact_id
 * @property int $uni_id
 * @property string $coordinator
 * @property string $contact_no
 * @property string $address
 */
class UniversityContact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'university_contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uni_id', 'coordinator', 'contact_no', 'address'], 'required'],
            [['uni_id'], 'integer'],
            [['address'], 'string'],
            [['coordinator', 'contact_no'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uni_contact_id' => 'Uni Contact ID',
            'uni_id' => 'Uni ID',
            'coordinator' => 'Coordinator',
            'contact_no' => 'Contact No',
            'address' => 'Address',
        ];
    }
}
