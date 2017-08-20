<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Students;

/**
 * StudentsSearch represents the model behind the search form about `common\models\Students`.
 */
class StudentsSearch extends Students
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['studentId', 'classId', 'status', 'sex', 'isResident'], 'integer'],
            [['number', 'sName', 'idNumber', 'address', 'birthday'], 'safe'],
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
        $query = Students::find();

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
            'studentId' => $this->studentId,
            'classId' => $this->classId,
            'status' => $this->status,
            'sex' => $this->sex,
            'isResident' => $this->isResident,
        ]);

        $query->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'sName', $this->sName])
            ->andFilterWhere(['like', 'idNumber', $this->idNumber])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'birthday', $this->birthday]);

        return $dataProvider;
    }
}
