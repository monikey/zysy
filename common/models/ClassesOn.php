<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ClassesOn".
 *
 * @property integer $id
 * @property string $schoolYear
 * @property integer $classId
 * @property integer $teacherId
 *
 * @property Teachers $teacher
 * @property Classes $class
 */
class ClassesOn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ClassesOn';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['classId', 'teacherId'], 'integer'],
            [['schoolYear'], 'string', 'max' => 20],
            [['teacherId'], 'exist', 'skipOnError' => true, 'targetClass' => Teachers::className(), 'targetAttribute' => ['teacherId' => 'teacherId']],
            [['classId'], 'exist', 'skipOnError' => true, 'targetClass' => Classes::className(), 'targetAttribute' => ['classId' => 'classId']],
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
            'teacherId' => 'Teacher ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teachers::className(), ['teacherId' => 'teacherId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClass()
    {
        return $this->hasOne(Classes::className(), ['classId' => 'classId']);
    }
}
