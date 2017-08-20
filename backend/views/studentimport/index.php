<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Students */

$this->title = '导入学生';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_import', [
        'model' => $model,
    ]) ?>

</div>