<?php

namespace app\modules\timetable\models;

use Yii;

/**
 * This is the model class for table "bell".
 *
 * @property integer $id
 * @property string $time_start
 * @property string $time_end
 *
 * @property TimetableModel[] $timetables
 */
class BellModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bell';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time_start', 'time_end'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time_start' => 'Start Time',
            'time_end' => 'End Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimetables()
    {
        return $this->hasMany(TimetableModel::className(), ['bell_id' => 'id']);
    }
}
