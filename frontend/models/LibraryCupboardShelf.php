<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "library_cupboard_shelf".
 *
 * @property integer $id
 * @property integer $Cupboard_id
 * @property integer $Capacity
 * @property string $Details
 */
class LibraryCupboardShelf extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'library_cupboard_shelf';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'Cupboard_id', 'Capacity', 'Details'], 'required'],
            [['id', 'Cupboard_id', 'Capacity'], 'integer'],
            [['Details'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Cupboard_id' => 'Cupboard ID',
            'Capacity' => 'Capacity',
            'Details' => 'Details',
        ];
    }
}
