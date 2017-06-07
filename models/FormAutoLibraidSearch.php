<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\dochub\models\FormAutoLibraid;

/**
 * FormAutoLibraidSearch represents the model behind the search form about `backend\modules\dochub\models\FormAutoLibraid`.
 */
class FormAutoLibraidSearch extends FormAutoLibraid
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['libaid_id', 'libaid_stid', 'libaid_reqamount'], 'integer'],
            [['libaid_date', 'libaid_year'], 'safe'],
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
        $query = FormAutoLibraid::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'libaid_id' => SORT_DESC,
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'libaid_id' => $this->libaid_id,
            'libaid_stid' => $this->libaid_stid,
            'libaid_date' => $this->libaid_date,
            'libaid_year' => $this->libaid_year,
            'libaid_reqamount' => $this->libaid_reqamount,
        ]);

        return $dataProvider;
    }
}
