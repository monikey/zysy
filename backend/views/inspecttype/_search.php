<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\InspecttypeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inspect-type-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'typeId') ?>

    <?= $form->field($model, 'typeName') ?>

    <?= $form->field($model, 'remarks') ?>

    <?= $form->field($model, 'createTime') ?>

    <?= $form->field($model, 'updateTime') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
