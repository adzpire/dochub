<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\dochub\models\FormAutoMf;

/**
 * FormAutoMfSearch represents the model behind the search form about `backend\modules\dochub\models\FormAutoMf`.
 */
class FormAutoMfSearch extends FormAutoMf
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fid', 'mf_ucheck', 'mf_dadorder', 'mf_momorder', 'mf_chstatus', 'mf_chright', 'mf_repchorder', 'mf_hospitaltype', 'mf_feeright', 'mf_lackfor', 'mf_lackright', 'mf_lackamount', 'mf_fiftyfor', 'mf_fiftyamount', 'mf_usedto', 'mf_want', 'mf_stid'], 'integer'],
            [['mf_utelephone', 'mf_spname', 'mf_dadname', 'mf_momname', 'mf_chname', 'mf_chbirth', 'mf_repchname', 'mf_repchbirth', 'mf_repchdeath', 'mf_ill', 'mf_hospital', 'mf_hosbdate', 'mf_hosedate', 'mf_year', 'mf_date'], 'safe'],
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
        $query = FormAutoMf::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'fid' => SORT_DESC,
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
            'fid' => $this->fid,
            'mf_ucheck' => $this->mf_ucheck,
            'mf_chbirth' => $this->mf_chbirth,
            'mf_dadorder' => $this->mf_dadorder,
            'mf_momorder' => $this->mf_momorder,
            'mf_chstatus' => $this->mf_chstatus,
            'mf_chright' => $this->mf_chright,
            'mf_repchorder' => $this->mf_repchorder,
            'mf_repchbirth' => $this->mf_repchbirth,
            'mf_repchdeath' => $this->mf_repchdeath,
            'mf_hospitaltype' => $this->mf_hospitaltype,
            'mf_hosbdate' => $this->mf_hosbdate,
            'mf_hosedate' => $this->mf_hosedate,
            'mf_feeright' => $this->mf_feeright,
            'mf_lackfor' => $this->mf_lackfor,
            'mf_lackright' => $this->mf_lackright,
            'mf_lackamount' => $this->mf_lackamount,
            'mf_fiftyfor' => $this->mf_fiftyfor,
            'mf_fiftyamount' => $this->mf_fiftyamount,
            'mf_usedto' => $this->mf_usedto,
            'mf_want' => $this->mf_want,
            'mf_date' => $this->mf_date,
            'mf_stid' => $this->mf_stid,
        ]);

        $query->andFilterWhere(['like', 'mf_utelephone', $this->mf_utelephone])
            ->andFilterWhere(['like', 'mf_spname', $this->mf_spname])
            ->andFilterWhere(['like', 'mf_dadname', $this->mf_dadname])
            ->andFilterWhere(['like', 'mf_momname', $this->mf_momname])
            ->andFilterWhere(['like', 'mf_chname', $this->mf_chname])
            ->andFilterWhere(['like', 'mf_repchname', $this->mf_repchname])
            ->andFilterWhere(['like', 'mf_ill', $this->mf_ill])
            ->andFilterWhere(['like', 'mf_hospital', $this->mf_hospital])
            ->andFilterWhere(['like', 'mf_year', $this->mf_year]);

        return $dataProvider;
    }
}
