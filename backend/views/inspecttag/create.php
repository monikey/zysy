<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\InspectTag */

$this->title = 'Create Inspect Tag';
$this->params['breadcrumbs'][] = ['label' => 'Inspect Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspect-tag-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
