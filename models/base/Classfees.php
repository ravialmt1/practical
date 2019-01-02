<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "class_fees".
 *
 * @property integer $id
 * @property integer $class_id
 * @property integer $classstudent_id
 * @property integer $amount
 * @property string $particulars
 * @property string $feesdate
 *
 * @property \app\models\ClassStudents $classstudent
 */
class Classfees extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'classstudent'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_id', 'classstudent_id', 'amount', 'particulars', 'feesdate'], 'required'],
            [['class_id', 'classstudent_id', 'amount'], 'integer'],
            [['feesdate'], 'safe'],
            [['particulars'], 'string', 'max' => 300]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'class_fees';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'class_id' => 'Class ID',
            'classstudent_id' => 'Classstudent ID',
            'amount' => 'Amount',
            'particulars' => 'Particulars',
            'feesdate' => 'Feesdate',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassstudent()
    {
        return $this->hasOne(\app\models\ClassStudents::className(), ['id' => 'classstudent_id']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\ClassfeesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ClassfeesQuery(get_called_class());
    }
}
