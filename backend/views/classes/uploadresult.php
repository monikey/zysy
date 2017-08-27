<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\base\Widget;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ClassesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '导入结果';
$this->params['breadcrumbs'][] = ['label' => '班级管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php 
    foreach ($dataProvider as $i)
    {
        echo($i['classname']."----------------------".$i['result']);
        echo("<p></p>");
    }
?>