<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'Учет времени прихода / ухода';
?>
<div class="site-index">

    <div class="jumbotron">

        <p>
            <?= Html::textInput('user_id')?>
        </p>

        <p>
            <?= Html::a('Время прихода', ['start'], ['class' => 'btn btn-success btn-lg']) ?>
            <?= Html::a('Время ухода', ['finish'], ['class' => 'btn btn-danger btn-lg']) ?>
        </p>

    </div>

    <div class="body-content">

    </div>
</div>
