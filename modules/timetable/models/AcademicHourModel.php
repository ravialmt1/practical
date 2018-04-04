<?php

namespace app\modules\timetable\models;

use Yii;

/**
 * This is the model class for table "academic_hour".
 *
 * @property integer $id
 * @property integer $class_id
 * @property integer $subject_id
 * @property integer $num_of_hours
 *
 * @property ClassModel $class
 * @property DisciplineModel $subject
 */
class AcademicHourModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'academic_hour';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_id', 'subject_id', 'num_of_hours'], 'required'],
            [['class_id', 'subject_id', 'num_of_hours'], 'integer'],
            [['class_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClassModel::className(), 'targetAttribute' => ['class_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => DisciplineModel::className(), 'targetAttribute' => ['subject_id' => 'id']],
        ];
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
            'num_of_hours' => 'Number of hours of load',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClass()
    {
        return $this->hasOne(ClassModel::className(), ['id' => 'class_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(DisciplineModel::className(), ['id' => 'subject_id']);
    }

    /**
     * Генерация нагрузки
     *
     * @param integer $classCount количество классов
     * @param integer $disciplineCount количество дисциплин
     * @return int
     */
    public static function generateAcademicYear($classCount, $disciplineCount)
    {
        $hours = 0;
        for($class = 1; $class <= $classCount; $class++) {
            for($discipline = 1; $discipline <= $disciplineCount; $discipline++) {
                $academicHourNew = new AcademicHourModel();
                $academicHourNew->class_id = $class;
                $academicHourNew->subject_id = $discipline;
                $hour = rand(0, 2);
                $academicHourNew->num_of_hours = $hour;
                $academicHourNew->save();
                $hours += $hour;
            }
        }
        return $hours;
    }
}
