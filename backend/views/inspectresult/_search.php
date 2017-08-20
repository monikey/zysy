<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\InspectresultSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inspect-result-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'resultId') ?>

    <?= $form->field($model, 'inspectTime') ?>

    <?= $form->field($model, 'inspectUserId') ?>

    <?= $form->field($model, 'inspectUser') ?>

    <?= $form->field($model, 'classId') ?>

    <?php // echo $form->field($model, 'typeId') ?>

    <?php // echo $form->field($model, 'id') ?>

    <?php // echo $form->field($model, 'typeName') ?>

    <?php // echo $form->field($model, 'itemId') ?>

    <?php // echo $form->field($model, 'itemName') ?>

    <?php // echo $form->field($model, 'tagId') ?>

    <?php // echo $form->field($model, 'tagName') ?>

    <?php // echo $form->field($model, 'tmpResult') ?>

    <?php // echo $form->field($model, 'finalResult') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
