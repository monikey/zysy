<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Department */

$this->title = 'Update Department: ' . $model->departmentId;
$this->params['breadcrumbs'][] = ['label' => '部门设置', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->departmentId, 'url' => ['view', 'id' => $model->departmentId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="department-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
