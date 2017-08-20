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
            [['number', 'sName', 'idNumber', 'address'], 'string', 'max' => 1],
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
            'files'=>'上传excel'
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
}
