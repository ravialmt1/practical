<?php

namespace app\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "classes".
 *
 * @property integer $id
 * @property integer $course_id
 * @property integer $sem
 * @property string $section
 *
 * @property \app\models\Course $course
 */
class Classes extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'course'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'sem', 'section'], 'required'],
            [['course_id', 'sem'], 'integer'],
            [['section'], 'string', 'max' => 11]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'classes';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_id' => 'Course ID',
            'sem' => 'Sem',
            'section' => 'Section',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(\app\models\Course::className(), ['course_id' => 'course_id']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
   /*  public function behaviors()
    {
        return [
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    } */


    /**
     * @inheritdoc
     * @return \app\models\ClassesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ClassesQuery(get_called_class());
    }
}
