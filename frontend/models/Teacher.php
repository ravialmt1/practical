<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "teacher".
 *
 * @property integer $id
 * @property integer $school
 * @property string $first_name
 * @property string $last_name
 * @property integer $subject_id
 *
 * @property Subject $subject
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'school', 'first_name', 'last_name', 'subject_id'], 'required'],
            [['id', 'school', 'subject_id'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 50],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'school' => 'School',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'subject_id' => 'Subject ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subject_id']);
    }
}
