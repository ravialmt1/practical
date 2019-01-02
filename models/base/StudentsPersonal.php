<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "students_personal".
 *
 * @property integer $stu_id
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
 * @property \app\models\Students $stu
 */
class StudentsPersonal extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'stu'
        ];
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
            [['parent_contact'], 'string', 'max' => 13]
        ];
    }

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
        return $this->hasOne(\app\models\Students::className(), ['id' => 'stu_id']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\StudentsPersonalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\StudentsPersonalQuery(get_called_class());
    }
}
