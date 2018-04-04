<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback_coursematrix".
 *
 * @property int $id
 * @property string $university
 * @property string $course_name
 * @property string $batch
 * @property int $semester
 * @property string $subject_code
 * @property string $category
 * @property string $subject
 */
class FeedbackCoursematrix extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feedback_coursematrix';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['university', 'course_name', 'batch', 'semester', 'subject_code', 'category', 'subject'], 'required'],
            [['semester'], 'integer'],
            [['university', 'course_name', 'subject','faculty'], 'string', 'max' => 200],
            [['batch', 'category'], 'string', 'max' => 10],
            [['subject_code'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'university' => 'University',
            'course_name' => 'Course Name',
            'batch' => 'Batch',
            'semester' => 'Semester',
            'subject_code' => 'Subject Code',
            'category' => 'Category',
            'subject' => 'Subject',
        ];
    }
}
