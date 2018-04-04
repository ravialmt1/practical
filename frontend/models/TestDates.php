<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "test_dates".
 *
 * @property integer $test_id
 * @property string $test_date
 */
class TestDates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test_dates';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['test_id', 'test_date'], 'required'],
            [['test_id'], 'integer'],
            [['test_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'test_id' => 'Test ID',
            'test_date' => 'Test Date',
        ];
    }
}
