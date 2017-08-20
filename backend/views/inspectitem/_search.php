<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\InspectitemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inspect-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'itemName') ?>

    <?= $form->field($model, 'remarks') ?>

    <?= $form->field($model, 'typeId') ?>

    <?= $form->field($model, 'createTime') ?>

    <?php // echo $form->field($model, 'updateTime') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
