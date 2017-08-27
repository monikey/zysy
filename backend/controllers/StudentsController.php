<?php

namespace backend\controllers;

use PHPExcel_Cell;
use PHPExcel_IOFactory;
use Yii;
use common\models\Students;
use common\models\StudentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\base\Model;
use common\models\Classes;



/**
 * StudentsController implements the CRUD actions for Students model.
 */
class StudentsController extends Controller
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
     * Lists all Students models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new Students();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=>$model,
        ]);
    }

    /**
     * Displays a single Students model.
     * @param integer $studentId
     * @param string $number
     * @param string $idNumber
     * @return mixed
     */
    public function actionView($studentId, $number, $idNumber)
    {
        return $this->render('view', [
            'model' => $this->findModel($studentId, $number, $idNumber),
        ]);
    }

    /**
     * Creates a new Students model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Students();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'studentId' => $model->studentId, 'number' => $model->number, 'idNumber' => $model->idNumber]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Students model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $studentId
     * @param string $number
     * @param string $idNumber
     * @return mixed
     */
    public function actionUpdate($studentId, $number, $idNumber)
    {
        $model = $this->findModel($studentId, $number, $idNumber);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'studentId' => $model->studentId, 'number' => $model->number, 'idNumber' => $model->idNumber]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Students model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $studentId
     * @param string $number
     * @param string $idNumber
     * @return mixed
     */
    public function actionDelete($studentId, $number, $idNumber)
    {
        $this->findModel($studentId, $number, $idNumber)->delete();

        return $this->redirect(['index']);
    }
    /**
     *excel导入学生数据
     */
    public  function actionImport()
    {
        //         set_time_limit(0);
        ini_set('memory_limit','256M');
        //require '/vendor/phpoffice/phpexcel/Classes/PHPExcel.php';        //引入PHPExcel
        $request = Yii::$app->request;
        $data = array();
        $models = new Students();
        if(isset($_FILES['Students'])){
            $models->files=$_FILES['Students'];
            if($_FILES['Students']["error"] > 0){
                $data = array('error'=>'1','msg'=>'文件上传失败,请重新上传..','info'=>'');
            }
            $excelFile = '';    //文件名
            $filepath = "uploads/";
            $allowtype=array("xls");
            $arr=explode(".", $_FILES['Students']['name']['files']);
            $hz=strtolower($arr[count($arr)-1]);
            
            if(!is_dir($filepath)) { mkdir($filepath, 0777); chmod($filepath, 0777);}
            $randname = date("Y").date("m").date("d").date("H").date("i").date("s").rand(1000, 9999).".".$hz;
            if(is_uploaded_file($_FILES['Students']['tmp_name']['files'])){      //将临时位置的文件移动到指定的目录上即可
                if(move_uploaded_file($_FILES['Students']['tmp_name']['files'], $filepath.'/'.$randname)){
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
                    for($column = 'A'; $column <= 'G'; $column++) {
                        $oneUser[] = trim($phpexcel->getCell($column.$row)->getValue());
                    }
                    $tmpStudents = new Students();
                    $number = $oneUser[0];        //学籍号
                    $sName = $oneUser[1];             //姓名
                    $idNumber = $oneUser[2];    //身份证
                    $address = $oneUser[3];     //地址
                     
                    if($oneUser[4]==='男')
                    {
                        $sex = 1;
                    }else {
                        $sex = 0;
                    }
                    
                    if($oneUser[5]==='是')
                        $isResident = 1;
                    else
                        $isResident = 0;
                    $grade = mb_substr($oneUser[6],0,2);
                    $major = mb_substr($oneUser[6],2,strlen($oneUser[6]));
                    $tmpClasses=Classes::find()->where(['grade'=>$grade,'major'=>$major])->one();
                    $tmpStudents->classId=$tmpClasses->classId;
                    $tmpStudents->address = $address;
                    $tmpStudents->number = $number;
                    $tmpStudents->sName = $sName;
                    $tmpStudents->idNumber = $idNumber;
                    $tmpStudents->sex = $sex;
                    $tmpStudents->isResident = $isResident;
                    //echo Yii::trace(CVarDumper::dumpAsString($test),'vardump');
                    if (Students::findOne($number)===null){
                        if (($tmpStudents->setBirthday())['error']==0){
                            if($tmpStudents->save()){
                                $msg[]=['studentName'=>$sName,'result'=>$sName.'导入成功，身份证未知错误'];
                            }else{
                                $msg[]=['studentName'=>$sName,'result'=>$sName.'导入失败，身份证未知错误'];
                            }
                            
                        }else if (($tmpStudents->setBirthday())['error']==1){
                            if ($tmpStudents->save()){
                                $msg[]=['studentName'=>$sName,'result'=>$sName.'导入成功，身份证格式错误'];
                            }else {
                                $msg[]=['studentName'=>$sName,'result'=>$sName.'导入失败，身份证格式错误'];
                            }
                        }
                        else {
                            if ($tmpStudents->save()){
                                $msg[]=['studentName'=>$sName,'result'=>$sName.'导入成功'];
                            }else {
                                $msg[]=['studentName'=>$sName,'result'=>$sName.'导入失败'];
                                print_r($tmpStudents->getErrors());
                            }
                        }
                    }else{
                        if (($tmpStudents->setBirthday())['error']==0){
                            if($tmpStudents->update()){
                                $msg[]=['studentName'=>$sName,'result'=>$sName.'更新成功，身份证未知错误'];
                            }else{
                                $msg[]=['studentName'=>$sName,'result'=>$sName.'更新失败，身份证未知错误'];
                            }
                            
                        }else if (($tmpStudents->setBirthday())['error']==1){
                            if ($tmpStudents->update()){
                                $msg[]=['studentName'=>$sName,'result'=>$sName.'更新成功，身份证格式错误'];
                            }else {
                                $msg[]=['studentName'=>$sName,'result'=>$sName.'更新失败，身份证格式错误'];
                            }
                        }
                        else {
                            if ($tmpStudent->update()){
                                $msg[]=['studentName'=>$sName,'msg'=>$sName.'更新成功'];
                            }else {
                                $msg[]=['studentName'=>$sName,'msg'=>$sName.'更新失败'];
                            }
                        }
                    }
                }
                
                return $this->render('uploadresult',['dataProvider'=>$msg]);
            }
        }
        return $this->render('index');
    }
    
    /**
     * Finds the Students model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $studentId
     * @param string $number
     * @param string $idNumber
     * @return Students the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($studentId, $number, $idNumber)
    {
        if (($model = Students::findOne(['studentId' => $studentId, 'number' => $number, 'idNumber' => $idNumber])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
