<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\InspectTag */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inspect-tag-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'createTime')->textInput() ?>

    <?= $form->field($model, 'updateTime')->textInput() ?>

    <?= $form->field($model, 'tagName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'itemId')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
