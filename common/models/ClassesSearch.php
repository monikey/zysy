<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Classes;

/**
 * ClassesSearch represents the model behind the search form about `common\models\Classes`.
 */
class ClassesSearch extends Classes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['classId', 'departmentId', 'status'], 'integer'],
            [['grade', 'major'], 'safe'],
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
        $query = Classes::find();

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
            'classId' => $this->classId,
            'departmentId' => $this->departmentId,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'grade', $this->grade])
            ->andFilterWhere(['like', 'major', $this->major]);

        return $dataProvider;
    }
}
