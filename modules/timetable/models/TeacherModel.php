<?php

namespace app\modules\timetable\models;

use Yii;

/**
 * This is the model class for table "teacher".
 *
 * @property integer $id
 * @property string $lastname
 * @property string $firstname
 * @property string $fathername
 *
 * @property TimetableModel[] $timetables
 */
class TeacherModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lastname', 'firstname'], 'required'],
            [['lastname', 'firstname', 'fathername'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lastname' => 'Last Name',
            'firstname' => 'First Name',
            'fathername' => 'Father Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimetables()
    {
        return $this->hasMany(TimetableModel::className(), ['teacher_id' => 'id']);
    }

    /**
     * ПРоверка занятости преподавателя
     *
     * @param integer $teacher
     * @param integer $day
     * @param integer $bell
     *
     * @return boolean
     */
    public static function checkTeacherEmployment($teacher, $day, $bell)
    {
        return !empty(TimetableModel::findAll(['teacher_id' => $teacher, 'day_id' => $day, 'bell_id' => $bell])) ? true : false;
    }
}
