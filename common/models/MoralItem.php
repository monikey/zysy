<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "MoralItem".
 *
 * @property integer $itemId
 * @property string $itemName
 * @property string $createTime
 * @property integer $typeId
 *
 * @property Moral[] $morals
 * @property MoralType $type
 */
class MoralItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MoralItem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['createTime'], 'safe'],
            [['typeId'], 'integer'],
            [['itemName'], 'string', 'max' => 50],
            [['typeId'], 'exist', 'skipOnError' => true, 'targetClass' => MoralType::className(), 'targetAttribute' => ['typeId' => 'typeId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'itemId' => 'Item ID',
            'itemName' => 'Item Name',
            'createTime' => 'Create Time',
            'typeId' => 'Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMorals()
    {
        return $this->hasMany(Moral::className(), ['itemId' => 'itemId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(MoralType::className(), ['typeId' => 'typeId']);
    }
}
