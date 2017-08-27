<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Students".
 *
 * @property integer $studentId
 * @property string $number
 * @property string $sName
 * @property string $idNumber
 * @property string $address
 * @property integer $classId
 * @property integer $status
 * @property string $birthday
 * @property integer $sex
 * @property integer $isResident
 *
 * @property Moral[] $morals
 * @property Classes $class
 */
class Students extends \yii\db\ActiveRecord
{
    public $files;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number', 'idNumber'], 'required'],
            [['classId', 'status', 'sex', 'isResident'], 'integer'],
            [['number', 'sName', 'idNumber', 'address'], 'string', 'max' => 50],
            [['birthday'], 'string', 'max' => 20],
            [['classId'], 'exist', 'skipOnError' => true, 'targetClass' => Classes::className(), 'targetAttribute' => ['classId' => 'classId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'studentId' => 'Student ID',
            'number' => 'Number',
            'sName' => 'S Name',
            'idNumber' => 'Id Number',
            'address' => 'Address',
            'classId' => 'Class ID',
            'status' => 'Status',
            'birthday' => 'Birthday',
            'sex' => 'Sex',
            'isResident' => 'Is Resident',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMorals()
    {
        return $this->hasMany(Moral::className(), ['studentId' => 'studentId', 'number' => 'number', 'idNumber' => 'idNumber']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClass()
    {
        return $this->hasOne(Classes::className(), ['classId' => 'classId']);
    }
    //用php从身份证中提取生日,包括15位和18位身份证
    public function setBirthday(){
        $result['error']=0;//0：未知错误，1：身份证格式错误，2：无错误
        $result['flag']='';//0标示成年，1标示未成年
        $result['tdate']='';//生日，格式如：2012-11-15
        if(!preg_match('/^[1-9]([0-9a-zA-Z]{17}|[0-9a-zA-Z]{14})$/',$this->idNumber)){
            $result['error']=1;
            return $result;
        }else{
            if(strlen($this->idNumber)==18){
                $tyear=intval(substr($this->idNumber,6,4));
                $tmonth=intval(substr($this->idNumber,10,2));
                $tday=intval(substr($this->idNumber,12,2));
                if($tyear>date("Y")||$tyear<(date("Y")-100)){
                    $flag=0;
                }elseif($tmonth<0||$tmonth>12){
                    $flag=0;
                }elseif($tday<0||$tday>31){
                    $flag=0;
                }else{
                    $tdate=$tyear."-".$tmonth."-".$tday." 00:00:00";
                    if((time()-mktime(0,0,0,$tmonth,$tday,$tyear))>18*365*24*60*60){
                        $flag=0;
                    }else{
                        $flag=1;
                    }
                }
            }elseif(strlen($this->idNumber)==15){
                $tyear=intval("19".substr($this->idNumber,6,2));
                $tmonth=intval(substr($this->idNumber,8,2));
                $tday=intval(substr($this->idNumber,10,2));
                if($tyear>date("Y")||$tyear<(date("Y")-100)){
                    $flag=0;
                }elseif($tmonth<0||$tmonth>12){
                    $flag=0;
                }elseif($tday<0||$tday>31){
                    $flag=0;
                }else{
                    $tdate=$tyear."-".$tmonth."-".$tday." 00:00:00";
                    if((time()-mktime(0,0,0,$tmonth,$tday,$tyear))>18*365*24*60*60){
                        $flag=0;
                    }else{
                        $flag=1;
                    }
                }
            }
        }
        $result['error']=2;//0：未知错误，1：身份证格式错误，2：无错误
        $result['isAdult']=$flag;//0标示成年，1标示未成年
        $this->birthday=$tdate;//生日日期
        return $result;
    } 
}
