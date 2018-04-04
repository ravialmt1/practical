<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "classes".
 *
 * @property integer $id
 * @property string $clas_name
 * @property string $section
 */
class Classes extends \yii\db\ActiveRecord
{
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
    public function rules()
    {
        return [
            [['clas_name', 'section'], 'required'],
            [['clas_name'], 'string', 'max' => 20],
            [['section'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'clas_name' => 'Clas Name',
            'section' => 'Section',
        ];
    }
}
