<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "test_questions".
 *
 * @property integer $test_id
 * @property string $questions
 */
class TestQuestions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test_questions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['test_id', 'questions'], 'required'],
            [['test_id'], 'integer'],
            [['questions'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'test_id' => 'Test ID',
            'questions' => 'Questions',
        ];
    }
}
