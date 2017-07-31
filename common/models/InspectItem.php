<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "InspectItem".
 *
 * @property integer $id
 * @property string $itemName
 * @property string $remarks
 * @property integer $typeId
 * @property string $createTime
 * @property string $updateTime
 *
 * @property InspectType $type
 * @property InspectResult[] $inspectResults
 * @property InspectTag[] $inspectTags
 */
class InspectItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'InspectItem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'typeId'], 'integer'],
            [['createTime', 'updateTime'], 'safe'],
            [['itemName', 'remarks'], 'string', 'max' => 50],
            [['typeId'], 'exist', 'skipOnError' => true, 'targetClass' => InspectType::className(), 'targetAttribute' => ['typeId' => 'typeId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'itemName' => 'Item Name',
            'remarks' => 'Remarks',
            'typeId' => 'Type ID',
            'createTime' => 'Create Time',
            'updateTime' => 'Update Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(InspectType::className(), ['typeId' => 'typeId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInspectResults()
    {
        return $this->hasMany(InspectResult::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInspectTags()
    {
        return $this->hasMany(InspectTag::className(), ['itemId' => 'id']);
    }
}
