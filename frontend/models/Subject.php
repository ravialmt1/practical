<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property integer $id
 * @property string $subject_code
 * @property string $subject_name
 * @property integer $clas
 * @property string $section
 *
 * @property Attendance[] $attendances
 * @property Students[] $students
 * @property Teacher[] $teachers
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject_code', 'subject_name', 'clas', 'section'], 'required'],
            [['clas'], 'integer'],
            [['subject_code', 'section'], 'string', 'max' => 30],
            [['subject_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject_code' => 'Subject Code',
            'subject_name' => 'Subject Name',
            'clas' => 'Clas',
            'section' => 'Section',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendances()
    {
        return $this->hasMany(Attendance::className(), ['subject_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Students::className(), ['student_clas' => 'clas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeachers()
    {
        return $this->hasMany(Teacher::className(), ['subject_id' => 'id']);
    }
}
