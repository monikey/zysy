<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Students */

$this->title = 'Update Students: ' . $model->studentId;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->studentId, 'url' => ['view', 'studentId' => $model->studentId, 'number' => $model->number, 'idNumber' => $model->idNumber]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="students-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
