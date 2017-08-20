<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\InspectType */

$this->title = '添加巡查时间';
$this->params['breadcrumbs'][] = ['label' => '巡查时间', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspect-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
