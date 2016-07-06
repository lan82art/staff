<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StartFinish */

$this->title = 'Обновить запись о приходе сотрудника: ' . ' ' . $model->id_sf;
$this->params['breadcrumbs'][] = ['label' => 'Приходы / уходы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sf, 'url' => ['view', 'id' => $model->id_sf]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="start-finish-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'users' => $users,
    ]) ?>

</div>
