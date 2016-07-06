<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\StartFinish */

$this->title = 'Создать запись';
$this->params['breadcrumbs'][] = ['label' => 'Приход / Уход', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="start-finish-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'users' => $users
    ]) ?>

</div>
