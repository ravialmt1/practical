<?php

namespace frontend\controllers;

use Yii;
use frontend\models\LibraryBooks;
use frontend\models\LibraryBookcatogary;
use frontend\models\LibraryBookcupboard;
use frontend\models\LibraryBooksSearch;
use frontend\models\LibraryCupboardShelf;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * LibraryBooksController implements the CRUD actions for LibraryBooks model.
 */
class LibraryBooksController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all LibraryBooks models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LibraryBooksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LibraryBooks model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new LibraryBooks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LibraryBooks();
		$lib_category = new LibraryBookcatogary();
		$lib_cupboard = new LibraryBookcupboard();
		$lib_shelf = new LibraryCupboardShelf();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Id]);
        } else {
			$lib_category1 = ArrayHelper::map(LibraryBookcatogary::find()->all(), 'id', 'book_catogary');
			$lib_cupboard1 = ArrayHelper::map(LibraryBookcupboard::find()->all(), 'id', 'Name');
			$lib_shelf1 = ArrayHelper::map(LibraryCupboardShelf::find()->all(), 'id','id');
            return $this->render('create', [
                'model' => $model,
				'lib_category1' => $lib_category1,
				'lib_cupboard1' => $lib_cupboard1,
				'lib_shelf1' => $lib_shelf1,
            ]);
        }
    }

    /**
     * Updates an existing LibraryBooks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing LibraryBooks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the LibraryBooks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LibraryBooks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LibraryBooks::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
