<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\db\expression;
use app\models\AtestQuestions;
use app\models\AtestQuestionAnswers;
use app\models\AtestParticipantAnswers;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use app\models\Model;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;


/**
 * AtestQuestionsController implements the CRUD actions for AtestQuestions model.
 */
class AtestQuestionsController extends Controller
{
    public function behaviors()
    {
        return [
		'access' => [
                'class' => AccessControl::className(),
                'only' => ['start'],
                'rules' => [[
				
				        'allow' => false,
                        'roles' => ['@'],
                    ],]],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            
        ]];
    }

    /**
     * Lists all AtestQuestions models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AtestQuestions::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
	
	public function actionStart()
    {
		$model = new AtestQuestions();
       //SELECT * FROM myTable WHERE RAND()<(SELECT ((1/COUNT(*))*10) FROM myTable) ORDER BY RAND() LIMIT 1;
	   $questions = AtestQuestions::find()->limit(10)->asArray()->all();
	   
	   $model = new AtestQuestions();
	   $ansmodel = new AtestQuestionAnswers();
	   $responsemodel = new AtestParticipantAnswers;

        return $this->render('start', [
            'questions' => $questions,
			'ansmodel' => $ansmodel,
			'responsemodel' => $responsemodel,
        ]);
    }

    /**
     * Displays a single AtestQuestions model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
		$answers = $model->atestQuestionAnswers;
        $providerAtestParticipantAnswers = new \yii\data\ArrayDataProvider([
            'allModels' => $model->atestParticipantAnswers,
        ]);
        $providerAtestQuestionAnswers = new \yii\data\ArrayDataProvider([
            'allModels' => $model->atestQuestionAnswers,
        ]);
        return $this->render('view', [
            'model' => $model,
			'answers' => $answers,
            'providerAtestParticipantAnswers' => $providerAtestParticipantAnswers,
            'providerAtestQuestionAnswers' => $providerAtestQuestionAnswers,
        ]);
    }

    /**
     * Creates a new AtestQuestions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AtestQuestions();
		 $modelsAnswers = [new AtestQuestionAnswers];

        if ($model->load(Yii::$app->request->post())) {
			
			
			$modelsAnswers = Model::createMultiple(AtestQuestionAnswers::classname());
            Model::loadMultiple($modelsAnswers, Yii::$app->request->post());
			
			
			 if (Yii::$app->request->isAjax) {
			 
               Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsAnswers),
                    ActiveForm::validate($model)
                );
            }
			//echo "Posted";
			// validate all models
            $valid = $model->validate();
			$valid = $modelsAnswers[0]->validate();
			//echo "aaaaaaaaaaaaaaa 1111- $valid -22222bbbbbbbbbbbbb";
            //$valid = Model::validateMultiple($modelsAnswers);
			
			//echo "aaaaaaaaaaaaaaa 1111- $valid -22222bbbbbbbbbbbbb";
			var_dump($valid);
            
            if ($valid) {
				
				echo "Valid";
                 $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsAnswers as $modelsAnswer) {
                            $modelsAnswer->atest_question_id = $model->atest_question_id;
                            if (! ($flag = $modelsAnswer->save(false))) {
                                $transaction->rollBack();
                                break;
                            } 
							
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->atest_question_id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                } 
            }

            
        } else {
             return $this->render('create', [
            'model' => $model,
            'modelsAnswers' => (empty($modelsAnswers)) ? [new AtestQuestionAnswers] : $modelsAnswers
        ]);
        }
    }

    /**
     * Updates an existing AtestQuestions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		
        $modelsAnswers = $model->atestQuestionAnswers;
		//var_dump($modelsAnswers);

         if ($model->load(Yii::$app->request->post())) {
			
		 

            $oldIDs = ArrayHelper::map($modelsAnswers, 'atest_question_id', 'atest_question_id');
            $modelsAnswers = Model::createMultiple(AtestQuestionAnswers::classname(), $modelsAnswers,'atest_question_answer_id');
			//var_dump($modelsAnswers);
            Model::loadMultiple($modelsAnswers, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsAnswers, 'atest_question_id', 'atest_question_id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsAnswers),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsAnswers) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            Answers::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsAnswers as $modelAnswers) {
                            $modelAnswers->atest_question_id = $model->atest_question_id;
                            if (! ($flag = $modelAnswers->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->atest_question_id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }  

        return $this->render('update', [
            'model' => $model,
            'modelsAnswers' => (empty($modelsAnswers)) ? [new AtestQuestionAnswers] : $modelsAnswers
        ]); 
    }

    /**
     * Deletes an existing AtestQuestions model.
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
     * Finds the AtestQuestions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AtestQuestions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AtestQuestions::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for AtestParticipantAnswers
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddAtestParticipantAnswers()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('AtestParticipantAnswers');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formAtestParticipantAnswers', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for AtestQuestionAnswers
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddAtestQuestionAnswers()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('AtestQuestionAnswers');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formAtestQuestionAnswers', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
