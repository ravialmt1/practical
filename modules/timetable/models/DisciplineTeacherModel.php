<?php

namespace app\modules\timetable\models;

use Yii;

/**
 * This is the model class for table "discipline_teacher".
 *
 * @property integer $id
 * @property integer $discipline_id
 * @property integer $teacher_id
 *
 * @property DisciplineModel $discipline
 * @property TeacherModel $teacher
 */
class DisciplineTeacherModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'discipline_teacher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['discipline_id', 'teacher_id'], 'required'],
            [['discipline_id', 'teacher_id'], 'integer'],
            [['discipline_id'], 'exist', 'skipOnError' => true, 'targetClass' => DisciplineModel::className(), 'targetAttribute' => ['discipline_id' => 'id']],
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
            'discipline_id' => 'Discipline ID',
            'teacher_id' => 'Teacher ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiscipline()
    {
        return $this->hasOne(DisciplineModel::className(), ['id' => 'discipline_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(TeacherModel::className(), ['id' => 'teacher_id']);
    }

    /**
     * Mixing the array
     *
     * @param array $array
     * @return array
     */
    protected static function randomArray(array $array)
    {
        $result = [];
        while(count($array)) {
            $element = array_rand($array);
            $result[] = $array[$element];
            unset($array[$element]);
        }
        return $result;
    }

    /**
     * Generating links for disciplines and teachers
     *
     * @param array $disciplines
     * @param array $teachers
     */
    public static function generateForeignDisciplineTeacher(array $disciplines, array $teachers)
    {
        // перемешиваем массив преподов
        $teachers = self::randomArray($teachers);
        // делаем связи
        for($i = 0; $i < count($disciplines); $i++) {
            echo "discipline ({$disciplines[$i]->name}) ->  teacher ({$teachers[$i]->lastname} {$teachers[$i]->firstname})\n";
            $disciplineTeacher = new DisciplineTeacherModel();
            $disciplineTeacher->discipline_id = $disciplines[$i]->id;
            $disciplineTeacher->teacher_id = isset($teachers[$i]) ? $teachers[$i]->id : $teachers[rand(0, count($teachers))]->id;
            $disciplineTeacher->save();
        }
    }
}
