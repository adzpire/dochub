<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\dochub\models\FormAutoMfg;

/**
 * FormAutoMfgSearch represents the model behind the search form about `backend\modules\dochub\models\FormAutoMfg`.
 */
class FormAutoMfgSearch extends FormAutoMfg
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fid', 'mfg_ucheck', 'mfg_chorder', 'mfg_chstatus', 'mfg_hospitaltype', 'mfg_hosfee', 'mfg_recnum', 'mfg_feeright', 'mfg_amount', 'mfg_uright', 'mfg_relright', 'mfg_stid'], 'integer'],
            [['mfg_spname', 'mfg_spid', 'mfg_dadname', 'mfg_dadid', 'mfg_momname', 'mfg_momid', 'mfg_chname', 'mfg_chid', 'mfg_chbirth', 'mfg_ill', 'mfg_hospital', 'mfg_hosbdate', 'mfg_hosedate', 'mfg_info', 'mfg_date'], 'safe'],
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
        $query = FormAutoMfg::find();

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
            'mfg_ucheck' => $this->mfg_ucheck,
            'mfg_chbirth' => $this->mfg_chbirth,
            'mfg_chorder' => $this->mfg_chorder,
            'mfg_chstatus' => $this->mfg_chstatus,
            'mfg_hospitaltype' => $this->mfg_hospitaltype,
            'mfg_hosbdate' => $this->mfg_hosbdate,
            'mfg_hosedate' => $this->mfg_hosedate,
            'mfg_hosfee' => $this->mfg_hosfee,
            'mfg_recnum' => $this->mfg_recnum,
            'mfg_feeright' => $this->mfg_feeright,
            'mfg_amount' => $this->mfg_amount,
            'mfg_uright' => $this->mfg_uright,
            'mfg_relright' => $this->mfg_relright,
            'mfg_date' => $this->mfg_date,
            'mfg_stid' => $this->mfg_stid,
        ]);

        $query->andFilterWhere(['like', 'mfg_spname', $this->mfg_spname])
            ->andFilterWhere(['like', 'mfg_spid', $this->mfg_spid])
            ->andFilterWhere(['like', 'mfg_dadname', $this->mfg_dadname])
            ->andFilterWhere(['like', 'mfg_dadid', $this->mfg_dadid])
            ->andFilterWhere(['like', 'mfg_momname', $this->mfg_momname])
            ->andFilterWhere(['like', 'mfg_momid', $this->mfg_momid])
            ->andFilterWhere(['like', 'mfg_chname', $this->mfg_chname])
            ->andFilterWhere(['like', 'mfg_chid', $this->mfg_chid])
            ->andFilterWhere(['like', 'mfg_ill', $this->mfg_ill])
            ->andFilterWhere(['like', 'mfg_hospital', $this->mfg_hospital])
            ->andFilterWhere(['like', 'mfg_info', $this->mfg_info]);

        return $dataProvider;
    }
}
