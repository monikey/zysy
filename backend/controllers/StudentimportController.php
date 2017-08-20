<?php
namespace backend\controllers;

use yii\web\Controller;
use common\models\StudentImport;

class StudentimportController extends Controller {
    /* other code */
    
    public function actionIndex() {
        $model = new StudentImport();
        return $this->render('index',
            [
                'model'=>$model,
                
            ]);
    }
}
?> 