<?php

namespace app\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "students".
 *
 * @property integer $id
 * @property integer $uni_id
 * @property integer $course_id
 * @property string $stu_name
 * @property string $reg_no
 * @property integer $semester
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
 * @property \app\models\Attendance[] $attendances
 * @property \app\models\Section[] $sections
 * @property \app\models\Course $course
 * @property \app\models\University $uni
 * @property \app\models\StudentsAcademic[] $studentsAcademics
 * @property \app\models\StudentsPersonal[] $studentsPersonals
 */
class Students extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'attendances',
            'sections',
            'course',
            'uni',
            'studentsAcademics',
            'studentsPersonals'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uni_id', 'course_id', 'semester'], 'integer'],
            [['course_id', 'stu_name', 'reg_no', 'semester', 'section', 'emai_id', 'mobile_no', 'laptop', 'smart_phone', 'address', 'dob', 'father_name', 'mother_name', 'parent_contact', 'caste', 'religion', 'nationality'], 'required'],
            [['address'], 'string'],
            [['stu_name', 'reg_no', 'mobile_no', 'laptop', 'smart_phone', 'dob', 'father_name', 'mother_name', 'caste', 'religion', 'nationality'], 'string', 'max' => 100],
            [['section'], 'string', 'max' => 20],
            [['emai_id'], 'string', 'max' => 200],
            [['parent_contact'], 'string', 'max' => 13]
        ];
    }

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
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uni_id' => 'Uni ID',
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
    public function getAttendances()
    {
        return $this->hasMany(\app\models\Attendance::className(), ['student_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSections()
    {
        return $this->hasMany(\app\models\Section::className(), ['stu_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(\app\models\Course::className(), ['course_id' => 'course_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUni()
    {
        return $this->hasOne(\app\models\University::className(), ['uni_id' => 'uni_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentsAcademics()
    {
        return $this->hasMany(\app\models\StudentsAcademic::className(), ['stu_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentsPersonals()
    {
        return $this->hasMany(\app\models\StudentsPersonal::className(), ['stu_id' => 'id']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }


    /**
     * @inheritdoc
     * @return \app\models\StudentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\StudentsQuery(get_called_class());
    }
}
