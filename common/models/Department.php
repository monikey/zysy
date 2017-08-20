<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Department".
 *
 * @property integer $departmentId
 * @property string $dName
 * @property string $dLeader
 *
 * @property Classes[] $classes
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dName'], 'string', 'max' => 50],
            [['dLeader'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'departmentId' => 'Department ID',
            'dName' => 'D Name',
            'dLeader' => 'D Leader',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClasses()
    {
        return $this->hasMany(Classes::className(), ['departmentId' => 'departmentId']);
    }
}
