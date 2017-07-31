<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\InspectResult */

$this->title = $model->resultId;
$this->params['breadcrumbs'][] = ['label' => 'Inspect Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspect-result-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->resultId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->resultId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'resultId',
            'inspectTime',
            'inspectUserId',
            'inspectUser',
            'classId',
            'typeId',
            'id',
            'typeName',
            'itemId',
            'itemName',
            'tagId',
            'tagName',
            'tmpResult',
            'finalResult',
        ],
    ]) ?>

</div>
