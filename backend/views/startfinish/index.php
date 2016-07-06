<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StartFinishSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Учет рабочего времени';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="start-finish-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'autoXlFormat'=>true,
        'filterModel' => $searchModel,
        'pjax'=>true,
        'bordered' => true,
        //'striped' => false,
        'condensed' => false,
        'responsive' => true,
        'responsiveWrap' =>true,
        'hover' => true,
        //'floatHeader' => true,
        //'floatHeaderOptions' => ['scrollingTop' => $scrollingTop],
        'panel' => [
            'type' => GridView::TYPE_DEFAULT
        ],
        'columns' => [
            //[class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id_sf',
                'label' => 'ID',
                'format' =>  'Text',
                'xlFormat' => 'Text',
                'headerOptions' => ['width' => '25'],
            ],


            [   'class' => 'yii\grid\ActionColumn',
                'header'=>'Действия',
                'headerOptions' => ['width' => '70'],
            ],
            [
                'attribute' => 'department',
                'label' => 'Отдел',
                'format' =>  'Text',
                'xlFormat' => 'Text',
                'headerOptions' => ['width' => '80'],
            ],
            [
                'attribute' => 'fio',
                'label' => 'ФИО',
                'format' =>  'Text',
                'xlFormat' => 'Text',
                'headerOptions' => ['width' => '270'],
            ],
            [
                'attribute' => 'created_at',
                'label' => 'Дата',
                'format' =>  ['date', 'dd.MM.Y'],
                'headerOptions' => ['width' => '40'],
            ],
            [
                'attribute' => 'created_at',
                'label' => 'День',
                'format' =>  ['date','php:D'],
                'headerOptions' => ['width' => '20'],
            ],
            [
                'attribute' => 'created_at',
                'label' => 'Приход',
                'format' =>  ['date', 'HH:mm:ss'],
                'xlFormat' => 'Short Time',
                'headerOptions' => ['width' => '40'],
            ],
            [
                'attribute' => 'updated_at',
                'label' => 'Уход',
                'format' =>  ['date', 'HH:mm:ss'],
                'xlFormat' => 'Short Time',
                'headerOptions' => ['width' => '40'],
            ],
            [
                //'format' => 'time',
            	'xlFormat' => 'Short Time',
                'class' => '\kartik\grid\FormulaColumn',
                'label' => 'Часов',
                'headerOptions' => ['width' => '30'],
                'value' => function ($model, $key, $index, $widget) {
                    $p = compact('model', 'key', 'index');
                    // Write your formula below
                return date("H:i", mktime(0, 0, ($widget->col(7, $p) - $widget->col(6, $p))));
                }
            ],
            [
                'attribute' => 'notes',
                'label' => 'Примечания',
                'xlFormat' => 'Text',
            ],
        ],
    ]); ?>

</div>
