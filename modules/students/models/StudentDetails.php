<?php

namespace app\modules\students\models;

use Yii;

/**
 * This is the model class for table "student_details".
 *
 * @property int $id
 * @property int $course_id
 * @property string $StuName
 * @property string $StuRegNo
 * @property string $StuGender
 * @property int $StuSem
 * @property string $StuEmail
 * @property string $StuMobile
 * @property int $StuClassTenMarks
 * @property string $StuClassTenBoard
 * @property int $StuClassTwelveMarks
 * @property string $StuClassTwelveBoard
 * @property string $Stream
 */
class StudentDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'StuName', 'StuRegNo', 'StuGender', 'StuSem', 'StuEmail', 'StuMobile', 'StuClassTenMarks', 'StuClassTenBoard', 'StuClassTwelveMarks', 'StuClassTwelveBoard', 'Stream'], 'required'],
            [['course_id', 'StuSem', 'StuClassTenMarks', 'StuClassTwelveMarks'], 'integer'],
            [['StuName', 'StuClassTenBoard', 'StuClassTwelveBoard'], 'string', 'max' => 100],
            [['StuRegNo', 'StuEmail'], 'string', 'max' => 30],
            [['StuGender', 'Stream'], 'string', 'max' => 20],
            [['StuMobile'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_id' => 'Course ID',
            'StuName' => 'Stu Name',
            'StuRegNo' => 'Stu Reg No',
            'StuGender' => 'Stu Gender',
            'StuSem' => 'Stu Sem',
            'StuEmail' => 'Stu Email',
            'StuMobile' => 'Stu Mobile',
            'StuClassTenMarks' => 'Stu Class Ten Marks',
            'StuClassTenBoard' => 'Stu Class Ten Board',
            'StuClassTwelveMarks' => 'Stu Class Twelve Marks',
            'StuClassTwelveBoard' => 'Stu Class Twelve Board',
            'Stream' => 'Stream',
        ];
    }
}
