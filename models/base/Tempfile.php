<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "temp_file".
 *
 * @property integer $id
 * @property resource $filename
 */
class Tempfile extends \yii\db\ActiveRecord
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
            [['filename'], 'required'],
            [['filename'], 'file']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'temp_file';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filename' => 'Filename',
        ];
    }


    /**
     * @inheritdoc
     * @return \app\models\TempfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\TempfileQuery(get_called_class());
    }
}
