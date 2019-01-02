<?php

namespace app\controllers;
use yii\filters\AccessControl;

use dektrium\rbac\controllers\RoleController as BaseAdminController;

class RoleController extends BaseAdminController
{
   
    public function actionCreate()
    {
        /** @var \dektrium\rbac\models\Role|\dektrium\rbac\models\Permission $model */
        $model = \Yii::createObject([
            'class'    => $this->modelClass,
            'scenario' => 'create',
        ]);

        $this->performAjaxValidation($model);

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    }
