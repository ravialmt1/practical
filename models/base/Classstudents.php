<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "class_students".
 *
 * @property integer $id
 * @property integer $class_id
 * @property string $student_name
 * @property string $regno
 *
 * @property \app\models\Classes $class
 */
class Classstudents extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'class'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_id', 'student_name', 'regno'], 'required'],
            [['class_id'], 'integer'],
            [['student_name'], 'string', 'max' => 200],
            [['regno'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'class_students';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'class_id' => 'Class ID',
            'student_name' => 'Student Name',
            'regno' => 'Regno',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClass()
    {
        return $this->hasOne(\app\models\Classes::className(), ['id' => 'class_id']);
    }
    public function getCoursename()
    {
		$course = \app\models\Classes::find('course_id')->where(['id' => 'class_id'])->One();
		$session = Yii::$app->session;
		$university_id = $session->get('uni_id');
		$course_name = Course::find('course_name')->where(['course_id' => $course, 'uni_id' =>$university_id])->One();
		return $course."aaa";
	}

    /**
     * @inheritdoc
     * @return \app\models\ClassstudentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ClassstudentsQuery(get_called_class());
    }
}
