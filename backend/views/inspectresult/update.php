<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InspectResult */

$this->title = 'Update Inspect Result: ' . $model->resultId;
$this->params['breadcrumbs'][] = ['label' => 'Inspect Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->resultId, 'url' => ['view', 'id' => $model->resultId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inspect-result-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
