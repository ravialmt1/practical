<?php

namespace app\modules\students\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property int $id
 * @property int $course_id
 * @property string $stu_name
 * @property string $reg_no
 * @property int $semester
 * @property string $section
 * @property string $emai_id
 * @property string $mobile_no
 * @property string $laptop
 * @property string $smart_phone
 * @property string $address
 * @property string $dob
 * @property string $father_name
 * @property string $mother_name
 * @property string $parent_contact
 * @property string $caste
 * @property string $religion
 * @property string $nationality
 *
 * @property StudentsAcademic[] $studentsAcademics
 * @property StudentsPersonal[] $studentsPersonals
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'stu_name', 'reg_no', 'semester', 'section', 'emai_id', 'mobile_no', 'laptop', 'smart_phone', 'address', 'dob', 'father_name', 'mother_name', 'parent_contact', 'caste', 'religion', 'nationality'], 'required'],
            [['course_id', 'semester'], 'integer'],
            [['address'], 'string'],
            [['stu_name', 'reg_no', 'laptop', 'smart_phone', 'dob', 'father_name', 'mother_name', 'caste', 'religion', 'nationality'], 'string', 'max' => 100],
            [['section'], 'string', 'max' => 20],
            [['emai_id'], 'string', 'max' => 200],
            [['mobile_no', 'parent_contact'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_id' => 'Course ID',
            'stu_name' => 'Stu Name',
            'reg_no' => 'Reg No',
            'semester' => 'Semester',
            'section' => 'Section',
            'emai_id' => 'Emai ID',
            'mobile_no' => 'Mobile No',
            'laptop' => 'Laptop',
            'smart_phone' => 'Smart Phone',
            'address' => 'Address',
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
  
}
