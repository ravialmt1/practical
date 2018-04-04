<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "library_book_vendor".
 *
 * @property integer $id
 * @property string $Name
 * @property string $Address
 * @property integer $Contact_no
 * @property string $email_id
 */
class LibraryBookVendor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'library_book_vendor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'Name', 'Address', 'Contact_no', 'email_id'], 'required'],
            [['id', 'Contact_no'], 'integer'],
            [['Address'], 'string'],
            [['Name', 'email_id'], 'string', 'max' => 100],
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
            'Address' => 'Address',
            'Contact_no' => 'Contact No',
            'email_id' => 'Email ID',
        ];
    }
}
