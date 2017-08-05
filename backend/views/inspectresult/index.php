<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\InspectresultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '巡查结果';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspect-result-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加巡查结果', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'resultId',
            'inspectTime',
            'inspectUserId',
            'inspectUser',
            'classId',
            // 'typeId',
            // 'id',
            // 'typeName',
            // 'itemId',
            // 'itemName',
            // 'tagId',
            // 'tagName',
            // 'tmpResult',
            // 'finalResult',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
