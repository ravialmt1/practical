<?php

namespace app\modules\timetable\models;

use Yii;

/**
 * This is the model class for table "days_week".
 *
 * @property integer $id
 * @property integer $number
 * @property string $name
 *
 * @property TimetableModel[] $timetables
 */
class DaysWeekModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'days_week';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Day of the week',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimetables()
    {
        return $this->hasMany(TimetableModel::className(), ['day_id' => 'id']);
    }
}
