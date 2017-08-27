<?php

namespace backend\controllers;

use Yii;
use common\models\Classes;
use common\models\ClassesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use common\models\Department;

/**
 * ClassesController implements the CRUD actions for Classes model.
 */
class ClassesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Classes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClassesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new Classes();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=>$model,
        ]);
    }

    /**
     * Displays a single Classes model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Classes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Classes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->classId]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Classes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->classId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Classes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    //班级导入动作
    public  function actionImport()
    {
        //         set_time_limit(0);
        ini_set('memory_limit','256M');
        //require '/vendor/phpoffice/phpexcel/Classes/PHPExcel.php';        //引入PHPExcel
        $request = Yii::$app->request;
        $data = array();
        $models = new Classes();
        if(isset($_FILES['Classes'])){
            $models->files=$_FILES['Classes'];
            if($_FILES['Classes']["error"] > 0){
                $data = array('error'=>'1','msg'=>'文件上传失败,请重新上传..','info'=>'');
            }
            $excelFile = '';    //文件名
            $filepath = "uploads/";
            $allowtype=array("xls");
            $arr=explode(".", $_FILES['Classes']['name']['files']);
            $hz=strtolower($arr[count($arr)-1]);
            
            if(!is_dir($filepath)) { mkdir($filepath, 0777); chmod($filepath, 0777);}
            $randname = date("Y").date("m").date("d").date("H").date("i").date("s").rand(1000, 9999).".".$hz;
            if(is_uploaded_file($_FILES['Classes']['tmp_name']['files'])){      //将临时位置的文件移动到指定的目录上即可
                if(move_uploaded_file($_FILES['Classes']['tmp_name']['files'], $filepath.'/'.$randname)){
                    $excelFile = $filepath.'/'.$randname;       //上传成功的节奏
                    chmod($excelFile, 0777);
                }
            }
            if(!$excelFile){        //文件不存在
                $data = array('error'=>'2','msg'=>'文件上传失败,请重新上传,检查文件名..','info'=>'');
            }else{      //读取Excel
                $phpexcel = new \PHPExcel;
                $excelReader = \PHPExcel_IOFactory::createReader('Excel5');
                $phpexcel = $excelReader->load($excelFile)->getSheet(0);//载入文件并获取第一个sheet
                $total_line = $phpexcel->getHighestRow();            //多少行
                $total_column = $phpexcel->getHighestColumn();       //多少列
                
                $msg = array();
                for($row = 2; $row <= $total_line; $row++) {
                    $oneUser = array();
                    for($column = 'A'; $column <= 'F'; $column++) {
                        $oneUser[] = trim($phpexcel->getCell($column.$row)->getValue());
                    }
                    //年级
                    $grade = $oneUser[0]; 
                    //专业
                    $major = $oneUser[1];
                    //所属部门
                    $departmentName = $oneUser[2];
                    
                    $tmpClasses = new Classes();
                    $tmpClasses->major= $oneUser[1];
                    $tmpClasses->grade = $oneUser[0];
                    //$tmpClasses->departmentId = $oneUser[2];
                    //$tmpDepartment=Department::find()->where(['dName'=>$departmentName])->one();
                    $tmpDepartment=Department::find()->where(['dName'=>$departmentName])->one();
                    $tmpClasses->departmentId = $tmpDepartment->departmentId;
                    //var_dump($tmpDepartment);
                    //echo ($tmpDepartment);
                    if (Classes::find()->where(['grade'=>$grade,'major'=>$major])->all()==null)
                    {
                        if($tmpClasses->save()){
                            $msg[] = ['classname'=>$grade.$major,'result'=>'导入成功'];
                            //$msg->getCount();
                        }else{
                            $msg[] = ['classname'=>$grade.$major,'result'=>'导入失败'];
                            var_dump($tmpClasses->getErrors());
                            
                        }
                    }else{
                        if($tmpClasses->update()){
                            $msg[] = ['classname'=>$grade.$major,'result'=>'更新成功'];
                            //$msg->getCount();
                        }else{
                            $msg[] = ['classname'=>$grade.$major,'result'=>'更新失败'];
                            //var_dump($tmpClasses->departmentId,$tmpClasses->major,$tmpClasses->grade);
                            print_r($tmpClasses->errors);
                        }
                    }
                    
                }
                
                //$info['err'] = $err;
                //$info['okk'] = $okk;
                //$data = array('error'=>'0','msg'=>'成功','info'=>$info);
                return $this->render('uploadresult',['dataProvider'=>$msg]);
            }
        }
        $models = new Classes();
        return $this->actionIndex();
    }

    /**
     * Finds the Classes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Classes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Classes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
