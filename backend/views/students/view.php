<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Students */

$this->title = $model->studentId;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'studentId' => $model->studentId, 'number' => $model->number, 'idNumber' => $model->idNumber], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'studentId' => $model->studentId, 'number' => $model->number, 'idNumber' => $model->idNumber], [
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
            'studentId',
            'number',
            'sName',
            'idNumber',
            'address',
            'classId',
            'status',
            'birthday',
            'sex',
            'isResident',
        ],
    ]) ?>

</div>
