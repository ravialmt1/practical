<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "students_details".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property integer $student_clas
 * @property string $section
 */
class StudentsDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'student_clas', 'section'], 'required'],
            [['student_clas'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 100],
            [['section'], 'string', 'max' => 30],
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
            'section' => 'Section',
        ];
    }
}
