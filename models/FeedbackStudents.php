<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback_students".
 *
 * @property int $id
 * @property string $university
 * @property string $student_name
 * @property string $registration_no
 * @property string $course_name
 * @property string $batch
 * @property int $semester
 * @property string $email_id
 * @property int $mobile_no
 */
class FeedbackStudents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feedback_students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['university', 'student_name', 'registration_no', 'course_name', 'batch', 'semester', 'email_id', 'mobile_no'], 'required'],
            [['semester', 'mobile_no'], 'integer'],
            [['university', 'student_name', 'course_name', 'email_id'], 'string', 'max' => 200],
            [['registration_no'], 'string', 'max' => 20],
            [['batch'], 'string', 'max' => 10],
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
            'student_name' => 'Student Name',
            'registration_no' => 'Registration No',
            'course_name' => 'Course Name',
            'batch' => 'Batch',
            'semester' => 'Semester',
            'email_id' => 'Email ID',
            'mobile_no' => 'Mobile No',
        ];
    }
}
