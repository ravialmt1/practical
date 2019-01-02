<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "students_academic".
 *
 * @property integer $stu_id
 * @property string $class10_marks
 * @property string $class10_board
 * @property string $class12_marks
 * @property string $class12_board
 * @property string $class12_stream
 * @property string $ug_perc
 * @property string $ug_stream
 * @property string $ug_university
 * @property string $sem1_perc
 * @property string $sem2_perc
 * @property string $sem3_perc
 * @property string $sem4_perc
 * @property string $sem5_perc
 * @property string $sem6_perc
 * @property string $sem7_perc
 * @property string $sem8_perc
 * @property string $sem9_perc
 * @property string $sem10_perc
 *
 * @property \app\models\Students $stu
 */
class StudentsAcademic extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'stu'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stu_id', 'class10_marks', 'class10_board', 'class12_marks', 'class12_board', 'class12_stream', 'ug_perc', 'ug_stream', 'ug_university', 'sem1_perc', 'sem2_perc', 'sem3_perc', 'sem4_perc', 'sem5_perc', 'sem6_perc', 'sem7_perc', 'sem8_perc', 'sem9_perc', 'sem10_perc'], 'required'],
            [['stu_id'], 'integer'],
            [['class10_marks', 'class12_marks', 'ug_perc', 'sem1_perc', 'sem2_perc', 'sem3_perc', 'sem4_perc', 'sem5_perc', 'sem6_perc', 'sem7_perc', 'sem8_perc', 'sem9_perc', 'sem10_perc'], 'string', 'max' => 100],
            [['class10_board', 'class12_board', 'class12_stream', 'ug_stream', 'ug_university'], 'string', 'max' => 300]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students_academic';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stu_id' => 'Stu ID',
            'class10_marks' => 'Class10 Marks',
            'class10_board' => 'Class10 Board',
            'class12_marks' => 'Class12 Marks',
            'class12_board' => 'Class12 Board',
            'class12_stream' => 'Class12 Stream',
            'ug_perc' => 'Ug Perc',
            'ug_stream' => 'Ug Stream',
            'ug_university' => 'Ug University',
            'sem1_perc' => 'Sem1 Perc',
            'sem2_perc' => 'Sem2 Perc',
            'sem3_perc' => 'Sem3 Perc',
            'sem4_perc' => 'Sem4 Perc',
            'sem5_perc' => 'Sem5 Perc',
            'sem6_perc' => 'Sem6 Perc',
            'sem7_perc' => 'Sem7 Perc',
            'sem8_perc' => 'Sem8 Perc',
            'sem9_perc' => 'Sem9 Perc',
            'sem10_perc' => 'Sem10 Perc',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStu()
    {
        return $this->hasOne(\app\models\Students::className(), ['id' => 'stu_id']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\StudentsAcademicQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\StudentsAcademicQuery(get_called_class());
    }
}
