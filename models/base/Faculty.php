<?php

namespace app\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "faculty".
 *
 * @property integer $fac_id
 * @property string $fac_name
 * @property integer $uni_id
 * @property integer $course_id
 *
 * @property \app\models\Attendance[] $attendances
 * @property \app\models\University $uni
 * @property \app\models\Course $course
 */
class Faculty extends \yii\db\ActiveRecord
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
            'uni',
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fac_name', 'uni_id', 'vertical'], 'required'],
            [['uni_id'], 'integer'],
            [['fac_name','vertical'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faculty';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fac_id' => 'Faculty',
            'fac_name' => 'Fac Name',
            'uni_id' => 'Uni ID',
            'vertical' => 'Vertical',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendances()
    {
        return $this->hasMany(\app\models\Attendance::className(), ['teacher_id' => 'fac_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUni()
    {
        return $this->hasOne(\app\models\University::className(), ['uni_id' => 'uni_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
   
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    /* public function behaviors()
    {
        return [
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'fac_id',
            ],
        ];
    } */


    /**
     * @inheritdoc
     * @return \app\models\FacultyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\FacultyQuery(get_called_class());
    }
}
