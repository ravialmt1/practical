<?php

namespace app\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "attendance_bell".
 *
 * @property integer $id
 * @property integer $university_id
 * @property integer $course_id
 * @property string $time_start
 * @property string $time_end
 *
 * @property \app\models\Attendance[] $attendances
 * @property \app\models\University $university
 * @property \app\models\Course $course
 * @property \app\models\Timetable[] $timetables
 */
class AttendanceBell extends \yii\db\ActiveRecord
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
            'university',
            'course',
            'timetables'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['university_id', 'course_id', 'time_start', 'time_end'], 'required'],
            [['university_id', 'course_id'], 'integer'],
            [['time_start', 'time_end'], 'string', 'max' => 100],
			[['bellTime'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attendance_bell';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'university_id' => 'University ID',
            'course_id' => 'Course ID',
            'time_start' => 'Time Start',
            'time_end' => 'Time End',
			'bellTime' => 'Bell Time',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendances()
    {
        return $this->hasMany(\app\models\Attendance::className(), ['bell_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniversity()
    {
        return $this->hasOne(\app\models\University::className(), ['uni_id' => 'university_id']);
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
    public function getBellTime()
    {
        return $this->time_start.' - '.$this->time_end;
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
     * @return \app\models\AttendanceBellQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\AttendanceBellQuery(get_called_class());
    }
}
