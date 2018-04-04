<?php

namespace app\modules\students\models;

use Yii;

/**
 * This is the model class for table "students_personal".
 *
 * @property int $stu_id
 * @property string $laptop
 * @property string $smart_phone
 * @property string $Address
 * @property string $city
 * @property string $dob
 * @property string $father_name
 * @property string $mother_name
 * @property string $parent_contact
 * @property string $caste
 * @property string $religion
 * @property string $nationality
 *
 * @property Students $stu
 */
class StudentsPersonal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students_personal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stu_id', 'laptop', 'smart_phone', 'Address', 'city', 'dob', 'father_name', 'mother_name', 'parent_contact', 'caste', 'religion', 'nationality'], 'required'],
            [['stu_id'], 'integer'],
            [['Address'], 'string'],
            [['laptop', 'smart_phone', 'father_name', 'mother_name', 'nationality'], 'string', 'max' => 300],
            [['city', 'caste', 'religion'], 'string', 'max' => 200],
            [['dob'], 'string', 'max' => 12],
            [['parent_contact'], 'string', 'max' => 13],
            [['stu_id'], 'exist', 'skipOnError' => true, 'targetClass' => Students::className(), 'targetAttribute' => ['stu_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stu_id' => 'Stu ID',
            'laptop' => 'Laptop',
            'smart_phone' => 'Smart Phone',
            'Address' => 'Address',
            'city' => 'City',
            'dob' => 'Dob',
            'father_name' => 'Father Name',
            'mother_name' => 'Mother Name',
            'parent_contact' => 'Parent Contact',
            'caste' => 'Caste',
            'religion' => 'Religion',
            'nationality' => 'Nationality',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStu()
    {
        return $this->hasOne(Students::className(), ['id' => 'stu_id']);
    }
}
