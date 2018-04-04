<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback_faculty".
 *
 * @property int $id
 * @property int $feed_id
 * @property string $faculty
 */
class FeedbackFaculty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feedback_faculty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['feed_id', 'faculty'], 'required'],
            [['feed_id'], 'integer'],
            [['faculty'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'feed_id' => 'Feed ID',
            'faculty' => 'Faculty',
        ];
    }
	/* public function beforeSave($insert) {
        if ($insert) {
             $query = new Query;
             $query->select('max(id) as feed_id')->from('feedback')->limit(1)->Scalar();
             $feed_id= intval($query)+1;

             $this->feed_id = $feed_id;
        }
        return parent::beforeSave($insert);
    } */
}
