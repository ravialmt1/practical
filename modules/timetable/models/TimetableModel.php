<?php

namespace app\modules\timetable\models;

use Yii;

/**
 * This is the model class for table "timetable".
 *
 * @property integer $id
 * @property integer $day_id
 * @property integer $bell_id
 * @property integer $teacher_id
 * @property integer $class_id
 * @property integer $subject_id
 *
 * @property BellModel $bell
 * @property ClassModel $class
 * @property DaysWeekModel $day
 * @property DisciplineModel $subject
 * @property TeacherModel $teacher
 */
class TimetableModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'timetable';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bell_id'], 'exist', 'skipOnError' => true, 'targetClass' => BellModel::className(), 'targetAttribute' => ['bell_id' => 'id']],
            [['class_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClassModel::className(), 'targetAttribute' => ['class_id' => 'id']],
            [['day_id'], 'exist', 'skipOnError' => true, 'targetClass' => DaysWeekModel::className(), 'targetAttribute' => ['day_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => DisciplineModel::className(), 'targetAttribute' => ['subject_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => TeacherModel::className(), 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'day_id' => 'Day ID',
            'bell_id' => 'Bell ID',
            'teacher_id' => 'Teacher ID',
            'class_id' => 'Class ID',
            'subject_id' => 'Subject ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBell()
    {
        return $this->hasOne(BellModel::className(), ['id' => 'bell_id']);
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
    public function getDay()
    {
        return $this->hasOne(DaysWeekModel::className(), ['id' => 'day_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(DisciplineModel::className(), ['id' => 'subject_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(TeacherModel::className(), ['id' => 'teacher_id']);
    }

    /**
     * Генерация расписания по нагрузке
     *
     * @param array $days
     * @param array $bells
     * @param array $academic_hours
     * @param array $teachers
     */
    public static function generate(array $days, array $bells, array $academic_hours, array $teachers)
    {
        $generateHour = range(1, 6);
        foreach ($academic_hours as $academic_hour) {
            for ($hour = 0; $hour < $academic_hour['num_of_hours']; $hour++) {
                $teacherNow = DisciplineTeacherModel::findOne([
                    'discipline_id' => $academic_hour['subject_id']
                ])->teacher_id;

                $dayNow = $days[rand(0, count($days) - 1)]['id'];
                $bellNow = $bells[rand(0, count($bells) - 1)]['id'];

                // генерируем новый день и время пары для препода
                while (TeacherModel::checkTeacherEmployment($teacherNow, $dayNow, $bellNow)
                    or ClassModel::checkClassEmployment($academic_hour['class_id'], $dayNow, $bellNow)) {
                    $dayNow = $days[rand(0, count($days) - 1)]['id'];
                    $bellNow = $bells[rand(0, count($bells) - 1)]['id'];
                }

                // записываем новое поле в расписании
                self::createRowTimetable(
                    $academic_hour['class_id'],
                    $academic_hour['subject_id'],
                    $teachers[$academic_hour['subject_id'] - 1]['id'],
                    $dayNow,
                    $bellNow
                );

                $generateHour[$dayNow]++;

                echo "Schedule for the class is recorded. {$academic_hour['class_id']} subject {$academic_hour['subject_id']}\n";
            }
        }
    }

    /**
     * Saving a schedule entry
     *
     * @param integer $class
     * @param integer $subject
     * @param integer $teacher
     * @param integer $day
     * @param integer $bell
     */
    protected static function createRowTimetable($class, $subject, $teacher, $day, $bell)
    {
        $timetable = new TimetableModel();
        $timetable->day_id = $day;
        $timetable->bell_id = $bell;
        $timetable->teacher_id = $teacher;
        $timetable->class_id = $class;
        $timetable->subject_id = $subject;
        $timetable->save();
    }

    /**
     * Generating a schedule for a class
     *
     * @param int $class class identifier
     * @return array
     */
    public static function generateTimetableClass($class)
    {
        $newTimetables = [];
        $timetables = TimetableModel::find()->where(['class_id' => $class])->all();
        foreach ($timetables as $timetable) {
            $newTimetables[$timetable['bell_id']][$timetable['day_id']][] = $timetable;
        }
        return $newTimetables;
    }
}
