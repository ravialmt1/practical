<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property integer $student_id
 * @property string $first_name
 * @property string $last_name
 * @property integer $teacher_id
 * @property integer $student_clas
 * @property string $section
 *
 * @property User $teacher
 * @property Clas $studentClas
 */
class Attendance extends \yii\db\ActiveRecord
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
            [['first_name', 'last_name', 'teacher_id', 'student_clas', 'section'], 'required'],
            [['teacher_id', 'student_clas'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 100],
            [['section'], 'string', 'max' => 30],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['teacher_id' => 'id']],
            [['student_clas'], 'exist', 'skipOnError' => true, 'targetClass' => Clas::className(), 'targetAttribute' => ['student_clas' => 'clas_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'student_id' => 'Student ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'teacher_id' => 'Teacher ID',
            'student_clas' => 'Select Class',
            'section' => 'Section',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(User::className(), ['id' => 'teacher_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentClas()
    {
        return $this->hasOne(Clas::className(), ['clas_id' => 'student_clas']);
    }
}
