<?php

namespace app\controllers;

use Yii;
use yii\base\Model;
use yii\web\Response;
use yii\bootstrap\ActiveForm;
use app\models\Attendance;
use app\models\AttendanceSearch;
use app\models\Classes;
use app\models\Course;
use app\models\Subjects;
use app\models\Students;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Request;
use yii\helpers\Json;
use yii\db\query;
use yii\db\schema;

/**
 * AttendanceController implements the CRUD actions for Attendance model.
 */
class AttendanceController extends Controller
{
    public $enableCsrfValidation = false;
   public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Attendance models.
     * @return mixed
     */
    public function actionSubjectSel() {
    $out = [];
	//$_POST['depdrop_parents'] = [2];
	if (isset($_POST['depdrop_parents'])) {
	//$_POST['depdrop_parents'] = ['2','IT'];
        $ids = $_POST['depdrop_parents'];
        $uni_id = empty($ids[0]) ? null : $ids[0];
       
		$course_id = empty($ids[1]) ? null : $ids[1];
		$sem = empty($ids[2]) ? null : $ids[2];
		$section = empty($ids[3]) ? null : $ids[3];
        $list = Subjects::find()->andWhere(['university_id'=>$uni_id,'course_id' => $course_id, 'sem' => $sem, 'section' => $section])->asArray()->all();
        $selected  = null;
        if (count($list) > 0) {
            $selected = '';
            foreach ($list as $i => $account) {
                $out[] = ['id' => $account['id'], 'name' => $account['sub_name']];
                if ($i == 0) {
                    $selected = $account['id'];
                }
            }
            // Shows how you can preselect a value
            echo Json::encode(['output' => $out, 'selected'=>$selected]);
            return;
        }
     }
    echo Json::encode(['output' => '', 'selected'=>'']);
}
public function actionVerticalSel() {
    $out = [];
	//$_POST['depdrop_parents'] = [2];
    if (isset($_POST['depdrop_parents'])) {
        $id = end($_POST['depdrop_parents']);
        $list = Course::find()->groupBy('vertical')->andWhere(['uni_id'=>$id])->asArray()->all();
        $selected  = null;
        if ($id != null && count($list) > 0) {
            $selected = '';
            foreach ($list as $i => $account) {
                $out[] = ['id' => $account['vertical'], 'name' => $account['vertical']];
                if ($i == 0) {
                    $selected = $account['vertical'];
                }
            }
            // Shows how you can preselect a value
            echo Json::encode(['output' => $out, 'selected'=>$selected]);
            return;
        }
    }
    echo Json::encode(['output' => '', 'selected'=>'']);
}

public function actionCourseSel() {
    $out = [];
	//$_POST['depdrop_parents'] = [2];
    if (isset($_POST['depdrop_parents'])) {
        $id = $_POST['depdrop_parents'][0];
		$vertical = $_POST['depdrop_parents']['1'];
		$list = Course::find()->andWhere(['uni_id'=>$id, 'vertical' => $vertical])->asArray()->all();
        //$list = Course::find()->groupBy('vertical')->andWhere(['uni_id'=>$id])->asArray()->all();
        $selected  = null;
        if ($id != null && count($list) > 0) {
            $selected = '';
            foreach ($list as $i => $account) {
                $out[] = ['id' => $account['course_id'], 'name' => $account['course_name']];
                if ($i == 0) {
                    $selected = $account['course_id'];
                }
            }
            // Shows how you can preselect a value
            echo Json::encode(['output' => $out, 'selected'=>$selected]);
            return;
        }
    }
    echo Json::encode(['output' => '', 'selected'=>'']);
}
	public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Attendance::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Attendance model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
	public function actionView2($sem)
    {
        //$model = $this->findModel($id);
        return $this->render('view2', [
            'sem' => $sem,
        ]);
    }
	

    /**
     * Creates a new Attendance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateatt($uni_id,$course_id,$sem,$hours,$section,$att_date)
{
	
	$stu_list = Students::find()->where(['uni_id' => $uni_id,'course_id'=> $course_id,'semester' => $sem, 'section' => $section ])->orderBy('id')->asArray()->all();
	//$models = [];
    //$models[] = new Attendance();
	
    $postData = Yii::$app->request->post();
	if ($postData) {
	//var_dump($postData['Attendance']['0']['student_id']);
	$count = count(Yii::$app->request->post('Attendance', []));
	//
	for ($a=0; $a<=$count-1; $a++) {
		//echo "$a.<br />";
		
		$value = Attendance::find()->max('id');
		$models[$a] = new Attendance();
		
		$value = $value+1;
		$value = $value;
		echo "The last insert id is <br />$value";
		echo "<br />";
		$models[$a]->id = $value;
		$models[$a]->student_id = $postData['Attendance'][$a]['student_id'];
		$models[$a]->section_id = $postData['Attendance'][$a]['section_id'];
		$models[$a]->att_date = $postData['Attendance'][$a]['att_date'];
		$models[$a]->teacher_id = 1;
		$models[$a]->subject_id = 1;
		$models[$a]->section_id = $postData['Attendance'][$a]['section_id'];
		$models[$a]->bell_id = $postData['Attendance'][$a]['bell_id'];
		$models[$a]->att_status = $postData['Attendance'][$a]['att_status'];
		//var_dump($models[$a]);
		$models[$a]->save();
		//
		
		
		//echo $postData['Attendance'][$a]['student_id'];
		
	}
	echo $count."No of students attendance is updated";
	}
	     

         
		
         else {
			$model = new Attendance();
            return $this->render('create_att', [
                'model' => $model,
				'stu_list' => $stu_list,
				'uni_id' => $uni_id,
			'course_id' => $course_id,
			'sem' => $sem,
			'hours' => $hours,
			'section' => $section,
			'att_date' => $att_date,
				
            ]);
        } 
 

    
}
	public function actionCreate()
    {
		
		//remove section_id from attendance table and update all the files
        //$att_model = new Attendance();
		$request = yii::$app->Request;
		$model = new Classes();
		
        if ($model->loadAll(Yii::$app->request->post()) ) {
			$post_value = $request->post();
			$sem = $model->sem;
			$section = $model->section;
			$course_id = $model->course_id;
			$section_id = Classes::find('id')->where(['course_id'=> $course_id,'sem' => $sem, 'section' => $section ])->One();
			//$att_date = $model->hours;
			//$sem = 2;
			$att_date = ($_POST["Classes"]["att_date"]);
			$hours = ($_POST["Classes"]["hours"]);
			//$att_date = ($_POST["Section"]["att_date"]);
			//var_dump($post_value);
			$course_id = $post_value['Classes']['course_id'];
			$uni_id = $post_value['Classes']['uni_id'];
			$sem = $post_value['Classes']['sem'];
			$att_date = $post_value['Classes']['att_date'];
			$section = $post_value['Classes']['section'];
			//$section_id = Section::find('id')->where(['uni_id' => $uni_id,'course_id'=> $course_id,'semester' => $sem, 'section' => $section ])->All();
			//$section_id = $section_id['section_id']['id'];
			$stu_list = Students::find()->where(['uni_id' => $uni_id,'course_id'=> $course_id,'semester' => $sem, 'section' => $section ])->orderBy('id')->asArray()->all();
            //var_dump($stu_list);
			//$query = new Query();
			/* $dataProvider = new ActiveDataProvider([
            'query' => Students::find()->where(['uni_id' => $uni_id,'course_id'=> $course_id,'semester' => $sem, 'section' => $section ])->orderBy('id'),
        ]); */
			$model = new Attendance();
			return $this->redirect(['createatt', 
			'uni_id' => $uni_id,
			'course_id' => $course_id,
			'sem' => $sem,
			'hours' => $hours,
			'section' => $section,
			'att_date' => $att_date
			
			//'section_id' => $section_id
			]);
        } else {
            return $this->render('create', [
                'model' => $model,
			//	'att_model' => $att_model,
            ]);
        }
    }
	public function actionAttendance()
    {
        $model = new Attendance();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('attendance', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Attendance model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Attendance model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }

    
    /**
     * Finds the Attendance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Attendance the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Attendance::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
