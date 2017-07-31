<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "InspectTag".
 *
 * @property string $createTime
 * @property string $updateTime
 * @property integer $tagId
 * @property string $tagName
 * @property integer $itemId
 *
 * @property InspectResult[] $inspectResults
 * @property InspectItem $item
 */
class InspectTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'InspectTag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['createTime', 'updateTime'], 'safe'],
            [['itemId'], 'integer'],
            [['tagName'], 'string', 'max' => 50],
            [['itemId'], 'exist', 'skipOnError' => true, 'targetClass' => InspectItem::className(), 'targetAttribute' => ['itemId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'createTime' => 'Create Time',
            'updateTime' => 'Update Time',
            'tagId' => 'Tag ID',
            'tagName' => 'Tag Name',
            'itemId' => 'Item ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInspectResults()
    {
        return $this->hasMany(InspectResult::className(), ['tagId' => 'tagId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(InspectItem::className(), ['id' => 'itemId']);
    }
}
