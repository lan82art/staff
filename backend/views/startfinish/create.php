<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\StartFinish */

$this->title = 'Создать запись о приходе сотрудника';
$this->params['breadcrumbs'][] = ['label' => 'Приходы / уходы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="start-finish-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'users' => $users,
    ]) ?>

</div>
