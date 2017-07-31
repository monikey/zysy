<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\InspecttagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inspect Tags';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspect-tag-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Inspect Tag', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'createTime',
            'updateTime',
            'tagId',
            'tagName',
            'itemId',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
