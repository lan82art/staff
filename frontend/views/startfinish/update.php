<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StartFinish */

$this->title = 'Указать время ухода: ' . ' ' . $model->id_sf;
$this->params['breadcrumbs'][] = ['label' => 'Приход / уход', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sf, 'url' => ['view', 'id' => $model->id_sf]];
$this->params['breadcrumbs'][] = 'Указать время ухода';
?>
<div class="start-finish-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'users' => $users,
    ]) ?>

</div>
