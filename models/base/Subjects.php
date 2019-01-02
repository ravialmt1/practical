<?php

namespace app\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "subjects".
 *
 * @property integer $id
 * @property integer $university_id
 * @property integer $course_id
 * @property integer $sem
 * @property string $sub_name
 *
 * @property \app\models\Attendance[] $attendances
 * @property \app\models\University $university
 * @property \app\models\Course $course
 */
class Subjects extends \yii\db\ActiveRecord
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
            'course'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['university_id', 'course_id', 'sem', 'sub_name','elective_group'], 'required'],
            [['university_id', 'course_id', 'sem','elective_group'], 'integer'],
            [['sub_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subjects';
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
            'sem' => 'Sem',
			'section' => 'Section',
            'sub_name' => 'Sub Name',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendances()
    {
        return $this->hasMany(\app\models\Attendance::className(), ['subject_id' => 'id']);
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
	
	public function getElective()
    {
        return $this->hasOne(\app\models\Subjectelectivemap::className(), ['id' => 'elective_group']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    /* public function behaviors()
    {
        return [
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    } */


    /**
     * @inheritdoc
     * @return \app\models\SubjectsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\SubjectsQuery(get_called_class());
    }
}
