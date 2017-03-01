<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Учет прихода / ухода';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="start-finish-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <p>
        <?php
           // echo date('d-m-Y',$now);
           echo Yii::$app->formatter->asDate($now);
        ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'autoXlFormat'=>true,
        'pjax'=>true,
        'bordered' => true,
        //'striped' => false,
        'condensed' => false,
        'responsive' => true,
        'responsiveWrap' =>true,
        'hover' => true,
        //'floatHeader' => true,
        //'floatHeaderOptions' => ['scrollingTop' => $scrollingTop],
        /*'panel' => [
            'type' => GridView::TYPE_DEFAULT
        ],*/
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => ['width' => '20'],
            ],
            [
                'attribute' => 'fio',
                'label' => 'ФИО',
                'format' =>  'Text',
                'xlFormat' => 'Text',
            ],
            [
                'attribute' => 'created_at',
                'format' =>  ['date', 'HH:mm:ss'],
                'headerOptions' => ['width' => '30'],
            ],
            [
                'attribute' => 'updated_at',
                'format' =>  ['date', 'HH:mm:ss'],
                'headerOptions' => ['width' => '30'],
            ],
            [
                'class' => '\kartik\grid\FormulaColumn',
                'label' => 'Часов',
                'headerOptions' => ['width' => '30'],
                'value' => function ($model, $key, $index, $widget) {
                    $p = compact('model', 'key', 'index');
                    // Write your formula below
                    return date("H:i", mktime(0, 0, ($widget->col(3, $p) - $widget->col(2, $p))));
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Действия',
                'headerOptions' => ['width' => '70'],
                'template' => '{update}',
                'buttons' => [
                    'update' => function ($url,$model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-log-out"></span>',
                            $url);
                    },
                ],
            ],
        ],
    ]); ?>

</div>
