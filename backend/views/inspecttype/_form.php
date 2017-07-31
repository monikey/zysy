<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\InspectType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inspect-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'typeId')->textInput() ?>

    <?= $form->field($model, 'typeName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'createTime')->textInput() ?>

    <?= $form->field($model, 'updateTime')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
