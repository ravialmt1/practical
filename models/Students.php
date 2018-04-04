<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property int $student_clas
 * @property string $email
 * @property int $uni_id
 * @property int $course_id
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email'], 'required'],
            [['student_clas', 'uni_id', 'course_id'], 'integer'],
            [['first_name', 'last_name', 'email'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'student_clas' => 'Student Clas',
            'email' => 'Email',
            'uni_id' => 'Uni ID',
            'course_id' => 'Course ID',
        ];
    }
}
