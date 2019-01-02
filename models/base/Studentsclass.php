<?php

namespace app\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "studentsclass".
 *
 * @property integer $student_id
 * @property integer $class_id
 *
 * @property \app\models\Students $student
 * @property \app\models\Classes $class
 */
class Studentsclass extends \yii\db\ActiveRecord
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
            'class'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'class_id'], 'required'],
            [['student_id', 'class_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'studentsclass';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'student_id' => 'Student ID',
            'class_id' => 'Class ID',
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
    public function getClass()
    {
        return $this->hasOne(\app\models\Classes::className(), ['id' => 'class_id']);
    }
	
	public function getCourse()
{      
	
    $classes =  classes::find()->where(['id'=>$this->class_id])->one();
	$course_id = $classes->course_id;
	$model = course::find()->where(['course_id' => $course_id])->one();
    if (! empty($model)) {
       //design my GridView
        $value = $model->course_name;
    }
    else
    {
        $value = 0;
    }
    return $value;
} 
	/*  
	 public function getCourse()
    {
        $course = $this->hasOne(\app\models\Classes::className(), ['id' => 'class_id']);
		return $this->hasOne(\app\models\Course::className(), ['id' => $course->course_id]);
		
    } */
    
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
     * @return \app\models\StudentsclassQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\StudentsclassQuery(get_called_class());
    }
}
