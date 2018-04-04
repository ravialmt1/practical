<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "library_book_catogary".
 *
 * @property integer $id
 * @property string $book_catogary
 */
class LibraryBookCatogary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'library_book_catogary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book_catogary'], 'required'],
            [['id'], 'integer'],
            [['book_catogary'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_catogary' => 'Book Catogary',
        ];
    }
}
