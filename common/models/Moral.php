<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Moral".
 *
 * @property integer $moralId
 * @property string $schoolYear
 * @property integer $score
 * @property string $description
 * @property integer $itemId
 * @property string $createTime
 * @property integer $studentId
 * @property string $number
 * @property string $idNumber
 * @property integer $typeId
 * @property string $itemName
 * @property string $typeName
 * @property integer $teacherId
 *
 * @property MoralItem $item
 * @property MoralType $type
 * @property Students $student
 * @property Teachers $teacher
 */
class Moral extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Moral';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['score', 'itemId', 'studentId', 'typeId', 'teacherId'], 'integer'],
            [['createTime'], 'safe'],
            [['schoolYear'], 'string', 'max' => 20],
            [['description'], 'string', 'max' => 200],
            [['number', 'idNumber'], 'string', 'max' => 1],
            [['itemName', 'typeName'], 'string', 'max' => 50],
            [['itemId'], 'exist', 'skipOnError' => true, 'targetClass' => MoralItem::className(), 'targetAttribute' => ['itemId' => 'itemId']],
            [['typeId'], 'exist', 'skipOnError' => true, 'targetClass' => MoralType::className(), 'targetAttribute' => ['typeId' => 'typeId']],
            [['studentId', 'number', 'idNumber'], 'exist', 'skipOnError' => true, 'targetClass' => Students::className(), 'targetAttribute' => ['studentId' => 'studentId', 'number' => 'number', 'idNumber' => 'idNumber']],
            [['teacherId'], 'exist', 'skipOnError' => true, 'targetClass' => Teachers::className(), 'targetAttribute' => ['teacherId' => 'teacherId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'moralId' => 'Moral ID',
            'schoolYear' => 'School Year',
            'score' => 'Score',
            'description' => 'Description',
            'itemId' => 'Item ID',
            'createTime' => 'Create Time',
            'studentId' => 'Student ID',
            'number' => 'Number',
            'idNumber' => 'Id Number',
            'typeId' => 'Type ID',
            'itemName' => 'Item Name',
            'typeName' => 'Type Name',
            'teacherId' => 'Teacher ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(MoralItem::className(), ['itemId' => 'itemId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(MoralType::className(), ['typeId' => 'typeId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Students::className(), ['studentId' => 'studentId', 'number' => 'number', 'idNumber' => 'idNumber']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teachers::className(), ['teacherId' => 'teacherId']);
    }
}
