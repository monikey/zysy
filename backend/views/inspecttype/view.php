<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\InspectType */

$this->title = $model->typeId;
$this->params['breadcrumbs'][] = ['label' => 'Inspect Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspect-type-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->typeId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->typeId], [
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
            'typeId',
            'typeName',
            'remarks',
            'createTime',
            'updateTime',
        ],
    ]) ?>

</div>
