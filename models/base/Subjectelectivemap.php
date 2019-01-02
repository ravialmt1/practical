<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "subjects_elective_group".
 *
 * @property integer $id
 * @property string $elective_group
 *
 * @property \app\models\Subjects[] $subjects
 */
class Subjectelectivemap extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'subjects'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'elective_group'], 'required'],
            [['id'], 'integer'],
            [['elective_group'], 'string', 'max' => 300]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subjects_elective_group';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'elective_group' => 'Elective Group',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasMany(\app\models\Subjects::className(), ['elective_group' => 'id']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\SubjectelectivemapQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\SubjectelectivemapQuery(get_called_class());
    }
}
