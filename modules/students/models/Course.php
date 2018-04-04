<?php

namespace app\modules\students\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property int $course_id
 * @property int $uni_id
 * @property string $vertical
 * @property string $course_name
 * @property string $course_short_name
 * @property string $course_batch
 *
 * @property University $uni
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uni_id', 'vertical', 'course_name', 'course_short_name', 'course_batch'], 'required'],
            [['uni_id'], 'integer'],
            [['vertical', 'course_batch'], 'string', 'max' => 200],
            [['course_name'], 'string', 'max' => 110],
            [['course_short_name'], 'string', 'max' => 100],
            [['uni_id'], 'exist', 'skipOnError' => true, 'targetClass' => University::className(), 'targetAttribute' => ['uni_id' => 'uni_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'course_id' => 'Course ID',
            'uni_id' => 'Uni ID',
            'vertical' => 'Vertical',
            'course_name' => 'Course Name',
            'course_short_name' => 'Course Short Name',
            'course_batch' => 'Course Batch',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUni()
    {
        return $this->hasOne(University::className(), ['uni_id' => 'uni_id']);
    }
}
