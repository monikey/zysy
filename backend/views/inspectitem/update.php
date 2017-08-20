<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InspectItem */

$this->title = 'Update Inspect Item: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inspect Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inspect-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
