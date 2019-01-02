<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faculty_map".
 *
 * @property int $fac_id
 * @property int $sub_id
 *
 * @property Faculty $fac
 * @property Subjects $sub
 */
class FacultyMap extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faculty_map';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fac_id', 'sub_id'], 'required'],
            [['fac_id', 'sub_id'], 'integer'],
            [['fac_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['fac_id' => 'fac_id']],
            [['sub_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subjects::className(), 'targetAttribute' => ['sub_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fac_id' => 'Faculty',
            'sub_id' => 'Subject',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFac()
    {
        return $this->hasOne(Faculty::className(), ['fac_id' => 'fac_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSub()
    {
        return $this->hasOne(Subjects::className(), ['id' => 'sub_id']);
    }
}
