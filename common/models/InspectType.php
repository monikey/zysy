<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "InspectType".
 *
 * @property integer $typeId
 * @property string $typeName
 * @property string $remarks
 * @property string $createTime
 * @property string $updateTime
 *
 * @property InspectItem[] $inspectItems
 * @property InspectResult[] $inspectResults
 */
class InspectType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'InspectType';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['typeId'], 'required'],
            [['typeId'], 'integer'],
            [['createTime', 'updateTime'], 'safe'],
            [['typeName', 'remarks'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'typeId' => 'Type ID',
            'typeName' => 'Type Name',
            'remarks' => 'Remarks',
            'createTime' => 'Create Time',
            'updateTime' => 'Update Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInspectItems()
    {
        return $this->hasMany(InspectItem::className(), ['typeId' => 'typeId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInspectResults()
    {
        return $this->hasMany(InspectResult::className(), ['typeId' => 'typeId']);
    }
}
