<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\base\Action;
use yii\base\Model;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StudentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '学生管理';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="students-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加学生', ['create'], ['class' => 'btn btn-success']) ?>
        
        <?php $form = ActiveForm::begin(['action' => ['students/import'],'method'=>'post',]); ?>
        		<? echo $form->field($model, 'files')->fileInput()?>
            <? echo Html::submitButton('提交', ['class'=>'btn btn-primary','name' =>'submit-button']) ?>

        <?php ActiveForm::end()?>
        <?php
            if(!empty($data)){//对反馈导入数据的成功失败进行展示，提示用户
                if($data['error'] == '0'){
                    $okk = $data['info']['okk'];
                    $err = $data['info']['err'];
                    foreach ($err as $errItem){ echo '<p style="color:#ff5800">'.$errItem.'</p>'; }
                    echo '<hr>';
                    foreach ($okk as $okkItem){ echo '<p style="color:green">'.$okkItem.'</p>'; }
                }else{
                    echo '<h2 style="color:#ff5800">'.$data['msg'].'</h2>';
                }
            }
        ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'studentId',
            'number',
            'sName',
            'idNumber',
            'address',
            'classId',
            'status',
            'birthday',
            'sex',
            'isResident',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
