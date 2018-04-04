<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "feedback_ques_master".
 *
 * @property integer $q_id
 * @property string $ques
 * @property string $one_word
 */
class FeedbackQuestions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feedback_ques_master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ques', 'one_word'], 'required'],
            [['ques', 'one_word'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'q_id' => 'Q ID',
            'ques' => 'Ques',
            'one_word' => 'One Word',
        ];
    }
}
