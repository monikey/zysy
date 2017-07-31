<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InspectTag */

$this->title = 'Update Inspect Tag: ' . $model->tagId;
$this->params['breadcrumbs'][] = ['label' => 'Inspect Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tagId, 'url' => ['view', 'id' => $model->tagId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inspect-tag-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
