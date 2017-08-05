<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\InspectResult */

$this->title = '添加巡查结果';
$this->params['breadcrumbs'][] = ['label' => '巡查结果', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspect-result-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
