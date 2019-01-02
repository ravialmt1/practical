<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "class_result".
 *
 * @property integer $class_result_id
 * @property integer $class_id
 * @property string $reg_no
 * @property string $Name
 * @property string $subject
 * @property string $internal
 * @property string $university_marks
 * @property string $practical
 * @property string $total
 * @property string $credits
 * @property string $grade
 */
class Classresult extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            ''
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_id', 'reg_no', 'Name', 'subject', 'internal', 'university_marks', 'practical', 'total', 'credits', 'grade'], 'required'],
            [['class_id'], 'integer'],
            [['reg_no'], 'string', 'max' => 20],
            [['Name'], 'string', 'max' => 100],
            [['subject'], 'string', 'max' => 200],
            [['internal', 'university_marks', 'practical', 'total', 'credits', 'grade'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'class_result';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'class_result_id' => 'Class Result ID',
            'class_id' => 'Class ID',
            'reg_no' => 'Reg No',
            'Name' => 'Name',
            'subject' => 'Subject',
            'internal' => 'Internal',
            'university_marks' => 'University Marks',
            'practical' => 'Practical',
            'total' => 'Total',
            'credits' => 'Credits',
            'grade' => 'Grade',
        ];
    }


    /**
     * @inheritdoc
     * @return \app\models\ClassresultQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ClassresultQuery(get_called_class());
    }
}
