<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property integer $test_id
 * @property integer $faculty_id
 * @property integer $class_id
 * @property integer $section_id
 * @property string $name
 * @property string $description
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['faculty_id', 'class_id',  'name', 'description'], 'required'],
            [['faculty_id', 'class_id'], 'integer'],
            [['description','section_id'], 'string'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'test_id' => 'Test ID',
            'faculty_id' => 'Faculty ID',
            'class_id' => 'Class ID',
            'section_id' => 'Section ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }
}
