<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\dochub\models\FormAutoUsebdgt;

/**
 * FormAutoUsebdgtSearch represents the model behind the search form about `backend\modules\dochub\models\FormAutoUsebdgt`.
 */
class FormAutoUsebdgtSearch extends FormAutoUsebdgt
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usebdgt_id', 'usebdgt_stid', 'usebdgt_bookno', 'usebdgt_headcmitt', 'usebdgt_frstcmitt', 'usebdgt_scndcmitt'], 'integer'],
            [['usebdgt_date', 'usebdgt_year', 'usebdgt_reason', 'usebdgt_bookdate'], 'safe'],
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
        $query = FormAutoUsebdgt::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'usebdgt_id' => SORT_DESC,
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
            'usebdgt_id' => $this->usebdgt_id,
            'usebdgt_stid' => $this->usebdgt_stid,
            'usebdgt_date' => $this->usebdgt_date,
            'usebdgt_year' => $this->usebdgt_year,
            'usebdgt_bookno' => $this->usebdgt_bookno,
            'usebdgt_bookdate' => $this->usebdgt_bookdate,
            'usebdgt_headcmitt' => $this->usebdgt_headcmitt,
            'usebdgt_frstcmitt' => $this->usebdgt_frstcmitt,
            'usebdgt_scndcmitt' => $this->usebdgt_scndcmitt,
        ]);

        $query->andFilterWhere(['like', 'usebdgt_reason', $this->usebdgt_reason]);

        return $dataProvider;
    }
}
