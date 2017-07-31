<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InspectResult;

/**
 * InspectresultSearch represents the model behind the search form about `common\models\InspectResult`.
 */
class InspectresultSearch extends InspectResult
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['resultId', 'inspectUserId', 'classId', 'typeId', 'id', 'itemId', 'tagId'], 'integer'],
            [['inspectTime', 'inspectUser', 'typeName', 'itemName', 'tagName'], 'safe'],
            [['tmpResult', 'finalResult'], 'number'],
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
        $query = InspectResult::find();

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
            'resultId' => $this->resultId,
            'inspectTime' => $this->inspectTime,
            'inspectUserId' => $this->inspectUserId,
            'classId' => $this->classId,
            'typeId' => $this->typeId,
            'id' => $this->id,
            'itemId' => $this->itemId,
            'tagId' => $this->tagId,
            'tmpResult' => $this->tmpResult,
            'finalResult' => $this->finalResult,
        ]);

        $query->andFilterWhere(['like', 'inspectUser', $this->inspectUser])
            ->andFilterWhere(['like', 'typeName', $this->typeName])
            ->andFilterWhere(['like', 'itemName', $this->itemName])
            ->andFilterWhere(['like', 'tagName', $this->tagName]);

        return $dataProvider;
    }
}
