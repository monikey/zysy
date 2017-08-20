<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ClassDuty".
 *
 * @property integer $id
 * @property string $schoolYear
 * @property integer $classId
 * @property string $className
 * @property integer $dutyId
 *
 * @property Classes $class
 * @property DutyArea $duty
 */
class ClassDuty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ClassDuty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['classId', 'dutyId'], 'integer'],
            [['schoolYear'], 'string', 'max' => 20],
            [['className'], 'string', 'max' => 50],
            [['classId'], 'exist', 'skipOnError' => true, 'targetClass' => Classes::className(), 'targetAttribute' => ['classId' => 'classId']],
            [['dutyId'], 'exist', 'skipOnError' => true, 'targetClass' => DutyArea::className(), 'targetAttribute' => ['dutyId' => 'dutyId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'schoolYear' => 'School Year',
            'classId' => 'Class ID',
            'className' => 'Class Name',
            'dutyId' => 'Duty ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClass()
    {
        return $this->hasOne(Classes::className(), ['classId' => 'classId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDuty()
    {
        return $this->hasOne(DutyArea::className(), ['dutyId' => 'dutyId']);
    }
}
