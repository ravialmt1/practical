<?php

namespace app\models;

use Yii;
use yii\db\Query;
$connection = \Yii::$app->db;
/**
 * This is the model class for table "subjects".
 *
 * @property int $sub_id
 * @property string $sub_name
 * @property int $university_id
 * @property string $course
 * @property int $sem
 *
 * @property Feedback[] $feedbacks
 * @property University $university
 */
class Subjects extends \yii\db\ActiveRecord
{
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
    public function rules()
    {
        return [
            [['faculty_id','sub_name', 'university_id', 'course', 'sem'], 'required'],
            [['faculty_id','university_id', 'sem'], 'integer'],
            [['sub_name'], 'string', 'max' => 100],
            [['course'], 'integer'],
            [['university_id'], 'exist', 'skipOnError' => true, 'targetClass' => University::className(), 'targetAttribute' => ['university_id' => 'uni_id']],
        ];
    }

    /**
     * @inheritdoc
	 
     */
	 
	 /* ActiveRelation */
public function getUniversity()
{
    return $this->hasOne(University::className(), ['uni_id' => 'university_id']);
}
 
/* Getter for country name */
public function getUniversityName() {
    return $this->university->university_name;
}


public function getFaculty()
{
    return $this->hasOne(Faculty::className(), ['fac_id' => 'faculty_id']);
}
 
/* Getter for country name */
public function getFacultyName() {
    return $this->faculty->fac_name;
}



public function getCourse()
{
	
    return $this->hasOne(Course::className(), ['course_id' => 'course']);
}
 
//Getter for country name
public function getCourseName() {
    //return $this->course['course_id'];
	$query = new Query;
	$query->select('course_name')
    ->from('course')->where(['course_id'=>'course']); 
	
	$command = $query->createCommand();
$data = $command->queryOne();
//var_dump($data);	
	return($data['course_name']);
	/* $provider1 = new ActiveDataProvider([
    'query' => $query,
]);
	$posts = $provider1->getModels();
	$course_name = Course::find()->select('course_name')->where(['course_id'=>135]);
	var_dump($course_name); */
}
    public function attributeLabels()
    {
        return [
            'sub_id' => 'Sub ID',
			'faculty_id' => 'Faculty',
            'sub_name' => 'Sub Name',
            'university_id' => 'University ID',
            'course' => 'Course',
            'sem' => 'Sem',
			'universityName' => Yii::t('app', 'University Name'),
			'facultyName' => Yii::t('app', 'Faculty Name'),
			'courseName' => Yii::t('app', 'Course Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
   
}
