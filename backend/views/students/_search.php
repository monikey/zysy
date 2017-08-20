<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StudentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'studentId') ?>

    <?= $form->field($model, 'number') ?>

    <?= $form->field($model, 'sName') ?>

    <?= $form->field($model, 'idNumber') ?>

    <?= $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'classId') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'birthday') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'isResident') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
