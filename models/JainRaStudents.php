<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jain_ra_students".
 *
 * @property int $id
 * @property string $course
 * @property int $sem
 * @property string $batch
 * @property string $regno
 * @property string $name
 */
class JainRaStudents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jain_ra_students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course', 'sem', 'batch', 'regno', 'name'], 'required'],
            [['sem'], 'integer'],
            [['course', 'batch', 'name'], 'string', 'max' => 100],
            [['regno'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course' => 'Course',
            'sem' => 'Sem',
            'batch' => 'Batch',
            'regno' => 'Regno',
            'name' => 'Name',
        ];
    }
}
