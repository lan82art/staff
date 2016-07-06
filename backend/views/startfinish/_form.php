<?php
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
//use kartik\datetime\DateTimePicker;
use kartik\form\ActiveForm;
use \yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\StartFinish */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="start-finish-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'empl_id')->dropDownList(ArrayHelper::map($users,'id','fio','department'),['prompt'=>'Выберите сотрудника', 'class' => 'btn-lg']) ?>

    <?php echo $form->field($model, 'notes')->textarea(['rows'=>'3'])?>

    <?php// echo $form->field($model, 'finish_at')->widget(DateTimePicker::className()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
