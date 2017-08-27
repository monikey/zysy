<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Classes".
 *
 * @property integer $classId
 * @property string $grade
 * @property string $major
 * @property integer $departmentId
 * @property integer $status
 *
 * @property ClassDuty[] $classDuties
 * @property Department $department
 * @property ClassesOn[] $classesOns
 * @property Students[] $students
 */
class Classes extends \yii\db\ActiveRecord
{
    public $files;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Classes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['departmentId', 'status'], 'integer'],
            [['grade', 'major'], 'string', 'max' => 10],
            [['departmentId'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['departmentId' => 'departmentId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'classId' => 'Class ID',
            'grade' => 'Grade',
            'major' => 'Major',
            'departmentId' => 'Department ID',
            'status' => 'Status',
            'files'=>'上传excel',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassDuties()
    {
        return $this->hasMany(ClassDuty::className(), ['classId' => 'classId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['departmentId' => 'departmentId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassesOns()
    {
        return $this->hasMany(ClassesOn::className(), ['classId' => 'classId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Students::className(), ['classId' => 'classId']);
    }
}
