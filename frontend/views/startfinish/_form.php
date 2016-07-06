<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use \yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\StartFinish */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="start-finish-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    //if ($model->isNewRecord)
       echo $form->field($model, 'empl_id')->dropDownList(ArrayHelper::map($users,'id','fio','department'),['prompt'=>'Выберите сотрудника', 'class' => 'btn-lg']);
    //else $form->field($model, 'empl_id')->dropDownList(ArrayHelper::map($users,'id','fio','department.department'),['prompt'=>'Выберите сотрудника', 'class' => 'btn-lg'])
    //else echo $form->label()

    echo $form->field($model, 'notes')->textarea(['rows'=>'3']);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать запись' : 'Установить время ухода', ['class' => $model->isNewRecord ? 'btn btn-success btn-lg' : 'btn btn-danger btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
