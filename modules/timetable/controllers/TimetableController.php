<?php

namespace app\modules\timetable\controllers;

use app\modules\timetable\models\BellModel;
use app\modules\timetable\models\ClassModel;
use app\modules\timetable\models\DaysWeekModel;
use app\modules\timetable\models\SearchTimetableClass;
use app\modules\timetable\models\TeacherModel;
use Yii;
use app\modules\timetable\models\TimetableModel;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Request;

/**
 * TimetableController implements the CRUD actions for TimetableModel model.
 */
class TimetableController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
            ],
        ];
    }

    /**
     * Lists all TimetableModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => TimetableModel::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionClass()
    {
        $model = new SearchTimetableClass();

        if ($model->load(Yii::$app->request->get()) && $model->validate()) {
            return $this->render('class', [
                'days' => DaysWeekModel::find()->all(),
                'bells' => BellModel::find()->all(),
                'classes' => ClassModel::find()
                    ->select(['id', 'number'])
                    ->indexBy('id')
                    ->column(),
                'timetables' => TimetableModel::generateTimetableClass($model->class),
                'model' => $model
            ]);
        } else {
            return $this->render('class', [
                'days' => DaysWeekModel::find()->all(),
                'bells' => BellModel::find()->all(),
                'classes' => ClassModel::find()
                    ->select(['id', 'number'])
                    ->indexBy('id')
                    ->column(),
                'timetables' => [],
                'model' => $model
            ]);
        }
    }

    /**
     * Finds the TimetableModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TimetableModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TimetableModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
