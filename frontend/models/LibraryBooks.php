<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "library_books".
 *
 * @property integer $Id
 * @property string $Isbn
 * @property string $Book_name
 * @property integer $Book_catogary_id
 * @property integer $Cupboard_id
 * @property integer $Cupboard_shelf_id
 * @property string $Author
 * @property integer $Copy
 */
class LibraryBooks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'library_books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'Isbn', 'Book_name', 'Book_catogary_id', 'Cupboard_id', 'Cupboard_shelf_id', 'Author', 'Copy'], 'required'],
            [['Id', 'Book_catogary_id', 'Cupboard_id', 'Cupboard_shelf_id', 'Copy'], 'integer'],
            [['Isbn'], 'string', 'max' => 20],
            [['Book_name', 'Author'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Isbn' => 'Isbn',
            'Book_name' => 'Book Name',
            'Book_catogary_id' => 'Book Catogary ID',
            'Cupboard_id' => 'Cupboard ID',
            'Cupboard_shelf_id' => 'Cupboard Shelf ID',
            'Author' => 'Author',
            'Copy' => 'Copy',
        ];
    }
}
