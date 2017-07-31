<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\InspectResult */

$this->title = 'Create Inspect Result';
$this->params['breadcrumbs'][] = ['label' => 'Inspect Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspect-result-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
