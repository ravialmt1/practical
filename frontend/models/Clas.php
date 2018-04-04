<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "clas".
 *
 * @property integer $id
 * @property integer $teacher_id
 * @property string $clas_name
 * @property string $section
 *
 * @property Attendance[] $attendances
 * @property User $teacher
 * @property Students[] $students
 */
class Clas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teacher_id', 'clas_name', 'section'], 'required'],
            [['teacher_id'], 'integer'],
            [['clas_name'], 'string', 'max' => 20],
            [['section'], 'string', 'max' => 2],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'teacher_id' => 'Teacher ID',
            'clas_name' => 'Clas Name',
            'section' => 'Section',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendances()
    {
        return $this->hasMany(Attendance::className(), ['class_id' => 'id']);
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
    public function getStudents()
    {
        return $this->hasMany(Students::className(), ['student_clas' => 'id']);
    }
}
