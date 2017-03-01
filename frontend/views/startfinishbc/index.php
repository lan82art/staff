<?php

use kartik\grid\GridView;
use kartik\form\ActiveForm;

$this->title = 'Учет прихода / ухода';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="start-finish-index">
    <div class="start-finish-form">
        <?php  $form = ActiveForm::begin([
            'id' => 'form-startfinishbc',
            'type' => ActiveForm::TYPE_INLINE,
            'fieldConfig' => [
                'autoPlaceholder'=>true
            ],
            'options' => [
                'enableAjaxValidation' => true,
            ]
        ]);
        $get = Yii::$app->request->get('fam');
        ?>
        <div class="row">
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                    <?=$form->field($model, 'empl_id', ['inputOptions' => ['autofocus' => 'autofocus', 'tabindex' => '1', 'selected' => 'true']])?>&nbsp;
                    <span style="font-size: 2em; font-weight: bold;"><?= $get ?></span>&nbsp;<span style="font-size: 3em; font-weight: bold;"><?= $now->format('H:i');?></span>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <?= $now->format('d-M-Y H:i:s');?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'autoXlFormat'=>true,
        'pjax'=>true,
        'bordered' => true,
        'condensed' => false,
        'responsive' => true,
        'responsiveWrap' =>true,
        'hover' => true,
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
            /*[
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
            ],*/
        ],
    ]); ?>
</div>