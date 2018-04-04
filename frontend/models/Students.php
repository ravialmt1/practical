<?php

namespace frontend\models;
use kartik\builder\TabularForm;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use Yii;

/**
 * This is the model class for table "students".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property integer $student_clas
 * @property string $section
 *
 * @property Attendance[] $attendances
 * @property Clas $studentClas
 * @property Subject $studentClas0
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'student_clas', 'section'], 'required',],
            //[['teacher_id', 'student_clas'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 100],
			[['first_name','last_name'], 'match', 'not' => true, 'pattern' => '/[^a-zA-Z_-]/',],
            [['section'], 'string', 'max' => 30],
        //    [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['teacher_id' => 'id']],
            [['student_clas'], 'exist', 'skipOnError' => true, 'targetClass' => Clas::className(), 'targetAttribute' => ['student_clas' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'student_clas' => 'Student Clas',
            'section' => 'Section',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendances()
    {
        return $this->hasOne(Attendance::className(), ['student_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentClas()
    {
        return $this->hasOne(Clas::className(), ['id' => 'student_clas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentClas0()
    {
        return $this->hasOne(Subject::className(), ['clas' => 'student_clas']);
    }

	public function getAttStatus() {
   // return $this->attendances->att_status;
}
	
	public function getFullName() {
    return $this->first_name . ' ' . $this->last_name;
}
public function getFormAttribs() {
	$list = [0 => 'Present', 1 => 'Absent', 2 => 'Tardy'];
    return [
        // primary key column
        'id'=>[ // primary key attribute
            'type'=>TabularForm::INPUT_HIDDEN, 
            'columnOptions'=>['hidden'=>true]
        ], 
        
        /* Your other attribute labels */
        'fullName' => ['type'=>TabularForm::INPUT_STATIC,
						Yii::t('app', 'Full Name')],
		'attstatus' =>['type' => TabularForm::INPUT_RADIO_LIST,
												
						'items' => $list,
						'options' => ['default' => '0'],
						
						],
		
    
		
	    
	   
       
    ];
}
}