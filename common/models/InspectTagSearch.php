<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InspectTag;

/**
 * InspecttagSearch represents the model behind the search form about `common\models\InspectTag`.
 */
class InspecttagSearch extends InspectTag
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['createTime', 'updateTime', 'tagName'], 'safe'],
            [['tagId', 'itemId'], 'integer'],
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
        $query = InspectTag::find();

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
            'createTime' => $this->createTime,
            'updateTime' => $this->updateTime,
            'tagId' => $this->tagId,
            'itemId' => $this->itemId,
        ]);

        $query->andFilterWhere(['like', 'tagName', $this->tagName]);

        return $dataProvider;
    }
}
