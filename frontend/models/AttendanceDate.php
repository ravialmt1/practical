<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "attendance_date".
 *
 * @property integer $id
 * @property string $date
 * @property integer $status
 */
class AttendanceDate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attendance_date';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'date'], 'required'],
            [['id', 'status'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'status' => 'Status',
        ];
    }
}
