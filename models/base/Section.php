<?php

namespace app\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "section".
 *
 * @property integer $id
 * @property integer $stu_id
 * @property integer $semester
 * @property string $section
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property \app\models\Attendance[] $attendances
 * @property \app\models\Students $stu
 */
class Section extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'attendances',
            'stu'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stu_id', 'semester', 'section', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['stu_id', 'semester', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['section'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'section';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'stu_id' => 'Stu ID',
            'semester' => 'Semester',
            'section' => 'Section',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendances()
    {
        return $this->hasMany(\app\models\Attendance::className(), ['section_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStu()
    {
        return $this->hasOne(\app\models\Students::className(), ['id' => 'stu_id']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }


    /**
     * @inheritdoc
     * @return \app\models\SectionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\SectionQuery(get_called_class());
    }
}
