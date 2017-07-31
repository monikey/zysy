<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\InspecttypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inspect Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspect-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Inspect Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'typeId',
            'typeName',
            'remarks',
            'createTime',
            'updateTime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
