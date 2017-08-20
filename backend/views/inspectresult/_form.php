<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\InspectResult */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inspect-result-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'inspectTime')->textInput() ?>

    <?= $form->field($model, 'inspectUserId')->textInput() ?>

    <?= $form->field($model, 'inspectUser')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'classId')->textInput() ?>

    <?= $form->field($model, 'typeId')->textInput() ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'typeName')->textInput() ?>

    <?= $form->field($model, 'itemId')->textInput() ?>

    <?= $form->field($model, 'itemName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tagId')->textInput() ?>

    <?= $form->field($model, 'tagName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tmpResult')->textInput() ?>

    <?= $form->field($model, 'finalResult')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
