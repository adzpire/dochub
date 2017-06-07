<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\dochub\models\FormAutoHirbdgt;

/**
 * FormAutoHirbdgtSearch represents the model behind the search form about `backend\modules\dochub\models\FormAutoHirbdgt`.
 */
class FormAutoHirbdgtSearch extends FormAutoHirbdgt
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hbdgt_id', 'hbdgt_stid', 'hbdgt_tax'], 'integer'],
            [['hbdgt_date', 'hbdgt_job', 'hbdgt_org', 'hbdgt_reason'], 'safe'],
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
        $query = FormAutoHirbdgt::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'hbdgt_id' => SORT_DESC,
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
            'hbdgt_id' => $this->hbdgt_id,
            'hbdgt_stid' => $this->hbdgt_stid,
            'hbdgt_date' => $this->hbdgt_date,
            'hbdgt_tax' => $this->hbdgt_tax,
        ]);

        $query->andFilterWhere(['like', 'hbdgt_job', $this->hbdgt_job])
            ->andFilterWhere(['like', 'hbdgt_org', $this->hbdgt_org])
            ->andFilterWhere(['like', 'hbdgt_reason', $this->hbdgt_reason]);

        return $dataProvider;
    }
}
