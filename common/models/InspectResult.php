<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "InspectResult".
 *
 * @property integer $resultId
 * @property string $inspectTime
 * @property integer $inspectUserId
 * @property string $inspectUser
 * @property integer $classId
 * @property integer $typeId
 * @property integer $id
 * @property string $typeName
 * @property integer $itemId
 * @property string $itemName
 * @property integer $tagId
 * @property string $tagName
 * @property double $tmpResult
 * @property double $finalResult
 *
 * @property InspectType $type
 * @property InspectItem $id0
 * @property InspectTag $tag
 */
class InspectResult extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'InspectResult';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inspectTime'], 'safe'],
            [['inspectUserId', 'classId', 'typeId', 'id', 'itemId', 'tagId'], 'integer'],
            [['typeName'], 'string'],
            [['tmpResult', 'finalResult'], 'number'],
            [['inspectUser', 'itemName', 'tagName'], 'string', 'max' => 50],
            [['typeId'], 'exist', 'skipOnError' => true, 'targetClass' => InspectType::className(), 'targetAttribute' => ['typeId' => 'typeId']],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => InspectItem::className(), 'targetAttribute' => ['id' => 'id']],
            [['tagId'], 'exist', 'skipOnError' => true, 'targetClass' => InspectTag::className(), 'targetAttribute' => ['tagId' => 'tagId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'resultId' => 'Result ID',
            'inspectTime' => 'Inspect Time',
            'inspectUserId' => 'Inspect User ID',
            'inspectUser' => 'Inspect User',
            'classId' => 'Class ID',
            'typeId' => 'Type ID',
            'id' => 'ID',
            'typeName' => 'Type Name',
            'itemId' => 'Item ID',
            'itemName' => 'Item Name',
            'tagId' => 'Tag ID',
            'tagName' => 'Tag Name',
            'tmpResult' => 'Tmp Result',
            'finalResult' => 'Final Result',
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
    public function getId0()
    {
        return $this->hasOne(InspectItem::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(InspectTag::className(), ['tagId' => 'tagId']);
    }
}
