<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InspectType */

$this->title = 'Update Inspect Type: ' . $model->typeId;
$this->params['breadcrumbs'][] = ['label' => 'Inspect Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->typeId, 'url' => ['view', 'id' => $model->typeId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inspect-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
