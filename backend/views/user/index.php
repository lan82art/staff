<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сотрудники';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать сотрудника', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax'=>true,
        'bordered' => true,
        'striped' => false,
        'condensed' => false,
        'responsive' => true,
        'responsiveWrap' =>true,
        'hover' => true,
        'floatHeader' => true,
        'panel' => [
            'type' => GridView::TYPE_DEFAULT
        ],
        'columns' => [
            //['class' => 'kartik\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'headerOptions' => ['width' => '20'],
            ],
            [
                'attribute' => 'username',
                'headerOptions' => ['width' => '30'],
            ],
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            // 'email:email',
            'fio',
            'department',
            // 'status',
            [
                'attribute' => 'created_at',
                'format' =>  ['datetime', 'HH:mm:ss dd.MM.Y'],
                'headerOptions' => ['width' => '160'],
            ],

             [
                'attribute' => 'updated_at',
                'format' =>  ['datetime', 'HH:mm:ss dd.MM.Y'],
                'headerOptions' => ['width' => '160'],
            ],

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>




</div>
