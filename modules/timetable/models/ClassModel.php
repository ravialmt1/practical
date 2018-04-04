<?php

namespace app\modules\timetable\models;

use Yii;

/**
 * This is the model class for table "class".
 *
 * @property integer $id
 * @property integer $number
 * @property string $letter
 *
 * @property AcademicHour[] $academicHours
 * @property Timetable[] $timetables
 */
class ClassModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'class';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number'], 'required'],
            [['number'], 'integer'],
            [['letter'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'number' => 'Class Number',
            'letter' => 'Letter',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcademicHours()
    {
        return $this->hasMany(AcademicHour::className(), ['class_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimetables()
    {
        return $this->hasMany(Timetable::className(), ['class_id' => 'id']);
    }

    /**
     * Проверка наличия занятия для класса
     *
     * @param integer $teacher
     * @param integer $day
     * @param integer $bell
     *
     * @return boolean
     */
    public static function checkClassEmployment($class, $day, $bell)
    {
        return !empty(TimetableModel::findAll(['class_id' => $class, 'day_id' => $day, 'bell_id' => $bell])) ? true : false;
    }
}
