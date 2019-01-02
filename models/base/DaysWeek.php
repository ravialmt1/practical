<?php

namespace app\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "days_week".
 *
 * @property integer $id
 * @property string $name
 *
 * @property \app\models\Timetable[] $timetables
 */
class DaysWeek extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'timetables'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'days_week';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimetables()
    {
        return $this->hasMany(\app\models\Timetable::className(), ['day_id' => 'id']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    /* public function behaviors()
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
     * @return \app\models\DaysWeekQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\DaysWeekQuery(get_called_class());
    }
}
