<?php

namespace app\modules\timetable\models;

use Yii;

/**
 * This is the model class for table "discipline".
 *
 * @property integer $id
 * @property string $name
 * @property string $name_short
 *
 * @property AcademicHourModel[] $academicHours
 * @property TimetableModel[] $timetables
 */
class DisciplineModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'discipline';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'name_short'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['name_short'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'name_short' => 'Short Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcademicHours()
    {
        return $this->hasMany(AcademicHourModel::className(), ['subject_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimetables()
    {
        return $this->hasMany(TimetableModel::className(), ['subject_id' => 'id']);
    }
}
