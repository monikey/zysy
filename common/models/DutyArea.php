<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "DutyArea".
 *
 * @property integer $dutyId
 * @property string $dutyName
 * @property string $areaDescription
 * @property string $code
 *
 * @property ClassDuty[] $classDuties
 */
class DutyArea extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'DutyArea';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dutyName'], 'string', 'max' => 50],
            [['areaDescription'], 'string', 'max' => 100],
            [['code'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dutyId' => 'Duty ID',
            'dutyName' => 'Duty Name',
            'areaDescription' => 'Area Description',
            'code' => 'Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassDuties()
    {
        return $this->hasMany(ClassDuty::className(), ['dutyId' => 'dutyId']);
    }
}
