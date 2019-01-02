<?php

namespace app\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "timetable".
 *
 * @property integer $id
 * @property integer $uni_id
 * @property integer $course_id
 * @property integer $sem
 * @property integer $section_id
 * @property integer $bell_id
 * @property integer $day_id
 * @property integer $subject_id
 *
 * @property \app\models\Course $course
 * @property \app\models\AttendanceBell $bell
 * @property \app\models\DaysWeek $day
 * @property \app\models\Subjects $subject
 * @property \app\models\Section $section
 * @property \app\models\University $uni
 */
class Timetable extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'course',
            'bell',
            'day',
            'subject',
            'section',
            'uni'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uni_id', 'course_id', 'sem', 'section_id', 'bell_id', 'day_id', 'subject_id'], 'required'],
            [['uni_id', 'sem', 'section_id', 'bell_id', 'day_id', 'subject_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'timetable';
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
            'sem' => 'Sem',
            'section_id' => 'Section ID',
            'bell_id' => 'Bell ID',
            'day_id' => 'Day ID',
            'subject_id' => 'Subject ID',
        ];
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
    public function getBell()
    {
        return $this->hasOne(\app\models\AttendanceBell::className(), ['id' => 'bell_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDay()
    {
        return $this->hasOne(\app\models\DaysWeek::className(), ['id' => 'day_id']);
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
    public function getSection()
    {
        return $this->hasOne(\app\models\Section::className(), ['id' => 'section_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUni()
    {
        return $this->hasOne(\app\models\University::className(), ['uni_id' => 'uni_id']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
   /*  public function behaviors()
    {
        return [
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }
 */

    /**
     * @inheritdoc
     * @return \app\models\TimetableQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\TimetableQuery(get_called_class());
    }
}
