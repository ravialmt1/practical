<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "library_book_cupboard".
 *
 * @property integer $id
 * @property string $Name
 * @property string $Description
 */
class LibraryBookCupboard extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'library_book_cupboard';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'Name', 'Description'], 'required'],
            [['id'], 'integer'],
            [['Description'], 'string'],
            [['Name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Name' => 'Name',
            'Description' => 'Description',
        ];
    }
}
