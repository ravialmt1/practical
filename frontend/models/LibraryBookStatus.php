<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "library_book_status".
 *
 * @property integer $id
 * @property string $Book_status
 * @property string $Details
 */
class LibraryBookStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'library_book_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'Book_status', 'Details'], 'required'],
            [['id'], 'integer'],
            [['Details'], 'string'],
            [['Book_status'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Book_status' => 'Book Status',
            'Details' => 'Details',
        ];
    }
}
