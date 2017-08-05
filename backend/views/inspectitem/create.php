<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\InspectItem */

$this->title = '添加巡查项目';
$this->params['breadcrumbs'][] = ['label' => '巡查项目', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspect-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
