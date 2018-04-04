<?php

namespace frontend\models;
use kartik\builder\TabularForm;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use Yii;
use frontend\models\Students;
use frontend\models\StudentsSearch;

/**
 * This is the model class for table "attendance".
 *
 * @property integer $id
 * @property integer $student_id
 * @property integer $teacher_id
 * @property integer $class_id
 * @property string $subject_code
 * @property string $att_date
 * @property integer $attendance
 *
 * @property Students $student
 * @property User $teacher
 * @property Clas $class
 * @property Subject $subjectCode
 */
class Attendance extends \yii\db\ActiveRecord
{
	
	public function getFormAttribs() {
		$student = new Students;
    return [
	
	

	
        // primary key column
        'id'=>[ // primary key attribute
            'type'=>TabularForm::INPUT_HIDDEN, 
            'columnOptions'=>['hidden'=>true]
        ], 
        'first_name'=>['type'=>TabularForm::INPUT_STATIC,
		'value'=>function ($student, $key, $index, $column) {
											return 'hello';
									}],
		'last_name'=>['type'=>TabularForm::INPUT_STATIC,
		'value'=>function ($model, $key, $index, $column) {
											return 'hello';
									}],
		
        'teacher_id'=>['type' =>TabularForm::INPUT_TEXT,
		'value'=>function ($model, $key, $index, $column) {
											return 'hello';
									}]
        
        /*
        'buy_amount'=>[
            'type'=>TabularForm::INPUT_TEXT, 
            'label'=>'Buy',
            'options'=>['class'=>'form-control text-right'], 
            'columnOptions'=>['hAlign'=>GridView::ALIGN_RIGHT, 'width'=>'90px']
        ],
        */
      
    ];
}
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attendance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'teacher_id', 'class_id', 'subject_id', 'att_status'], 'required'],
            [['student_id', 'teacher_id', 'class_id', 'att_status'], 'integer'],
            [['att_date'], 'safe'],
            [['subject_id'], 'integer'],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Students::className(), 'targetAttribute' => ['student_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['teacher_id' => 'id']],
            [['class_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clas::className(), 'targetAttribute' => ['class_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student ID',
            'teacher_id' => 'Teacher ID',
            'class_id' => 'Class ID',
            'subject_code' => 'Subject Code',
            'att_date' => 'Att Date',
            'att_status' => 'att_status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Students::className(), ['id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(User::className(), ['id' => 'teacher_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClass()
    {
        return $this->hasOne(Clas::className(), ['id' => 'class_id']);
    }
public function getFullName()
   {
      return $this->first_name . " " . $this->last_name;
   }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectCode()
    {
        return $this->hasOne(Subject::className(), ['subject_code' => 'subject_id']);
    }
}
