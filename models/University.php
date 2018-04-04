<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "university".
 *
 * @property int $uni_id
 * @property string $university_name
 *
 * @property Course[] $courses
 * @property Subjects[] $subjects
 */
class University extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'university';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['university_name'], 'required'],
            [['university_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uni_id' => 'Uni ID',
            'university_name' => 'University Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['uni_id' => 'uni_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasMany(Subjects::className(), ['university_id' => 'uni_id']);
    }
}
