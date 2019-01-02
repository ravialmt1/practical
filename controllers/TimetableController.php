<?php

namespace app\controllers;

use Yii;
use yii\base\Model;
use app\models\Timetable;
use app\models\Classes;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TimetableController implements the CRUD actions for Timetable model.
 */
class TimetableController extends Controller
{
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
     * Lists all Timetable models.
     * @return mixed
     */
    public function actionIndex($id)
    {
		$classmodel = Classes::find()->where(['id' => $id]);
		$course_id = $classmodel->one()->course_id;
		$semester = $classmodel->one()->sem;
		$section = $classmodel->one()->section;
		
		$dataProvider = new ActiveDataProvider([
            'query' => Timetable::find()->where(['course_id' => $course_id, 'sem' => $semester, 'section_id' => $section ]),
        ]);
        

        return $this->render('index', [
            'dataProvider' => $dataProvider,
			'id' => $id,
        ]);
    }

public function actionTimetable_inline($id)
    {
		$classmodel = Classes::find()->where(['id' => $id]);
		$course_id = $classmodel->one()->course_id;
		$semester = $classmodel->one()->sem;
		$section = $classmodel->one()->section;
		
		$dataProvider = new ActiveDataProvider([
            'query' => Timetable::find()->where(['course_id' => $course_id, 'sem' => $semester, 'section_id' => $section ]),
        ]);
        

        return $this->render('timetable_inline', [
            'dataProvider' => $dataProvider,
			'id' => $id,
        ]);
    }
    /**
     * Displays a single Timetable model.
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

    /**
     * Creates a new Timetable model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Timetable();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Timetable model.
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
     * Deletes an existing Timetable model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
	 
	  public function actionTimetable($id)
    {
		 //var_dump(Yii::$app->request->post('Timetable'));
		 $count = count(Yii::$app->request->post('Timetable'));
		 //echo "<br /> $count <br />";
		 if($count>0){
			 
    $models = [new Timetable()];
    for($i = 1; $i < $count; $i++) {
        $models[] = new Timetable();
		//var_dump($models);
	}
		 //$model = new Timetable();

        
        if (Model::loadMultiple($models, Yii::$app->request->post())) {
            foreach ($models as $model) {
				var_dump($model);
				if ($model->save())
					echo "Saved Successfully";
            }
            return $this->redirect('index');
        }
		
			//var_dump(Model::loadMultiple($models, Yii::$app->request->post()));
	}
		else
//echo "No data";
$classmodel = Classes::find()->where(['id' => $id]);
		$course_id = $classmodel->one()->course_id;
		$semester = $classmodel->one()->sem;
		$section = $classmodel->one()->section;
					
        $model = new Timetable();
		
        return $this->render('timetable', ['model' => $model,'id'=> $id]);
    }
	
	
	
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }

    
    /**
     * Finds the Timetable model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Timetable the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Timetable::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
