<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InspectType;

/**
 * InspecttypeSearch represents the model behind the search form about `common\models\InspectType`.
 */
class InspecttypeSearch extends InspectType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['typeId'], 'integer'],
            [['typeName', 'remarks', 'createTime', 'updateTime'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = InspectType::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'typeId' => $this->typeId,
            'createTime' => $this->createTime,
            'updateTime' => $this->updateTime,
        ]);

        $query->andFilterWhere(['like', 'typeName', $this->typeName])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
