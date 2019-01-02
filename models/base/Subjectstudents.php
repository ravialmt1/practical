<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "class_subject_students".
 *
 * @property integer $id
 * @property integer $class_id
 * @property integer $subject_id
 * @property integer $student_id
 *
 * @property \app\models\Classes $class
 * @property \app\models\Subjects $subject
 * @property \app\models\ClassStudents $student
 */
class Subjectstudents extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'class',
            'subject',
            'student'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_id', 'subject_id', 'student_id'], 'required'],
            [['class_id', 'subject_id', 'student_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'class_subject_students';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'class_id' => 'Class ID',
            'subject_id' => 'Subject ID',
            'student_id' => 'Student ID',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClass()
    {
        return $this->hasOne(\app\models\Classes::className(), ['id' => 'class_id']);
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
    public function getStudent()
    {
        return $this->hasOne(\app\models\ClassStudents::className(), ['id' => 'student_id']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\SubjectstudentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\SubjectstudentsQuery(get_called_class());
    }
}
