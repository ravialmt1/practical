<?php

namespace app\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "attendance".
 *
 * @property integer $id
 * @property integer $student_id
 * @property integer $teacher_id
 * @property integer $section_id
 * @property integer $subject_id
 * @property string $att_date
 * @property integer $bell_id
 * @property integer $att_status
 *
 * @property \app\models\Students $student
 * @property \app\models\Faculty $teacher
 * @property \app\models\Section $section
 * @property \app\models\Subjects $subject
 * @property \app\models\AttendanceBell $bell
 */
class Attendance extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'student',
            'teacher',
            'section',
            'subject',
            'bell'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'teacher_id', 'section_id', 'subject_id', 'bell_id', 'att_status'], 'required'],
            [['student_id', 'teacher_id', 'section_id', 'subject_id', 'bell_id', 'att_status'], 'integer'],
            [['att_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attendance';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student ID',
            'teacher_id' => 'Teacher ID',
            'section_id' => 'Section ID',
            'subject_id' => 'Subject ID',
            'att_date' => 'Att Date',
            'bell_id' => 'Bell ID',
            'att_status' => 'Att Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(\app\models\Students::className(), ['id' => 'student_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(\app\models\Faculty::className(), ['fac_id' => 'teacher_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(\app\models\Section::className(), ['id' => 'section_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(\app\models\Subjects::className(), ['id' => 'subject_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBell()
    {
        return $this->hasOne(\app\models\AttendanceBell::className(), ['id' => 'bell_id']);
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
     * @return \app\models\AttendanceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\AttendanceQuery(get_called_class());
    }
}
