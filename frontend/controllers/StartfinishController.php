<?php

namespace frontend\controllers;

//use kartik\datetime\DateTimePicker;
use Yii;
use common\models\StartFinish;
use common\models\User;
use frontend\models\StartFinishSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StartfinishController implements the CRUD actions for StartFinish model.
 */
class StartfinishController extends Controller
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

    public function actionIndex()
    {
        $now = new \DateTime();

        $searchModel = new StartFinishSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=100;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'now' => $now,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $users = User::find()->orderBy('emp_dep,fio')->all();
        $model = new StartFinish();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id_sf]);
            return $this->redirect(['index']);

        } else {
            return $this->render('create', [
                'model' => $model,
                'users' => $users,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $users = User::find()->orderBy('emp_dep,fio')->all();
        $model = StartFinish::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id_sf]);
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'users' => $users,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = StartFinish::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
