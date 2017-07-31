<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\InspectType */

$this->title = 'Create Inspect Type';
$this->params['breadcrumbs'][] = ['label' => 'Inspect Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspect-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
