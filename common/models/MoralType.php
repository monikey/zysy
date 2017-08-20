<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "MoralType".
 *
 * @property integer $typeId
 * @property string $typeName
 * @property string $remarks
 * @property string $createTime
 * @property integer $typeValue
 *
 * @property Moral[] $morals
 * @property MoralItem[] $moralItems
 */
class MoralType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MoralType';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['createTime'], 'safe'],
            [['typeValue'], 'integer'],
            [['typeName'], 'string', 'max' => 20],
            [['remarks'], 'string', 'max' => 100],
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
            'typeValue' => 'Type Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMorals()
    {
        return $this->hasMany(Moral::className(), ['typeId' => 'typeId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMoralItems()
    {
        return $this->hasMany(MoralItem::className(), ['typeId' => 'typeId']);
    }
}
