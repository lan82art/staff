<?php

namespace frontend\controllers;

use Yii;
use common\models\StartFinish;
use frontend\models\StartFinishSearch;
use yii\web\Controller;
use yii\filters\VerbFilter;

class StartfinishbcController extends Controller
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

        $entry = Yii::$app->request->post();

        if (!empty($entry)) {
            $model =  StartFinish::find()->where(["DATE_FORMAT(FROM_UNIXTIME(start_finish.created_at),'%d-%m-%Y' )" => date('d-m-Y')])->andWhere(['empl_id'=>$entry['StartFinish']['empl_id']])->one();
            if (!isset($model)) $model = new StartFinish();

        }else {$model = new StartFinish();}

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->save();
            return $this->redirect(['index','fam' => $model->fio, 'time' => $now]);
        }

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'now' => $now,
                'model' => $model,
            ]);
        }
}