<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Teachers".
 *
 * @property integer $teacherId
 * @property string $number
 * @property string $phone
 * @property string $shortPhone
 * @property string $idNumber
 * @property string $teacherName
 * @property integer $status
 *
 * @property ClassesOn[] $classesOns
 * @property Moral[] $morals
 */
class Teachers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Teachers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['number'], 'string', 'max' => 50],
            [['phone', 'shortPhone', 'idNumber', 'teacherName'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'teacherId' => 'Teacher ID',
            'number' => 'Number',
            'phone' => 'Phone',
            'shortPhone' => 'Short Phone',
            'idNumber' => 'Id Number',
            'teacherName' => 'Teacher Name',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassesOns()
    {
        return $this->hasMany(ClassesOn::className(), ['teacherId' => 'teacherId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMorals()
    {
        return $this->hasMany(Moral::className(), ['teacherId' => 'teacherId']);
    }
}
