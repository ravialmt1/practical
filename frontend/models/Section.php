<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "section".
 *
 * @property integer $section_id
 * @property integer $clas_id
 * @property string $section_name
 *
 * @property Clas $clas
 */
class Section extends \yii\db\ActiveRecord
{
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
    public function rules()
    {
        return [
            [['section_id', 'clas_id', 'section_name'], 'required'],
            [['section_id', 'clas_id'], 'integer'],
            [['section_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'section_id' => 'Section ID',
            'clas_id' => 'Clas ID',
            'section_name' => 'Section Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClas()
    {
        return $this->hasOne(Clas::className(), ['clas_id' => 'clas_id']);
    }
}
