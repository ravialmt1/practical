<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "class_result_done".
 *
 * @property integer $class_id
 * @property integer $result_fetched
 */
class Classresultdone extends \yii\db\ActiveRecord
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
            [['result_fetched'], 'required'],
            [['result_fetched'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'class_result_done';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'class_id' => 'Class ID',
            'result_fetched' => 'Result Fetched',
        ];
    }


    /**
     * @inheritdoc
     * @return \app\models\ClassresultdoneQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ClassresultdoneQuery(get_called_class());
    }
}
