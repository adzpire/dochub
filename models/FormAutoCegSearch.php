<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\dochub\models\FormAutoCeg;

/**
 * FormAutoCegSearch represents the model behind the search form about `backend\modules\dochub\models\FormAutoCeg`.
 */
class FormAutoCegSearch extends FormAutoCeg
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fid', 'ceg_spjobtype', 'ceg_right', 'ceg_feetype', 'ceg_ch1dadorder', 'ceg_ch1momorder', 'ceg_ch1reporder', 'ceg_ch1fee1', 'ceg_ch1fee2', 'ceg_ch2dadorder', 'ceg_ch2momorder', 'ceg_ch2reporder', 'ceg_ch2fee1', 'ceg_ch2fee2', 'ceg_ch3dadorder', 'ceg_ch3momorder', 'ceg_ch3reporder', 'ceg_ch3fee1', 'ceg_ch3fee2', 'ceg_feeright', 'ceg_money', 'ceg_agree', 'ceg_agreemoney', 'ceg_stid'], 'integer'],
            [['ceg_spname', 'ceg_spposition', 'ceg_spbelong', 'ceg_ch1name', 'ceg_ch1birth', 'ceg_ch1repname', 'ceg_ch1repbirth', 'ceg_ch1repdeath', 'ceg_ch1schl', 'ceg_ch1schlamphur', 'ceg_ch1schlprovince', 'ceg_ch1schlclass', 'ceg_ch2name', 'ceg_ch2birth', 'ceg_ch2repname', 'ceg_ch2repbirth', 'ceg_ch2repdeath', 'ceg_ch2schl', 'ceg_ch2schlamphur', 'ceg_ch2schlprovince', 'ceg_ch2schlclass', 'ceg_ch3name', 'ceg_ch3birth', 'ceg_ch3repname', 'ceg_ch3repbirth', 'ceg_ch3repdeath', 'ceg_ch3schl', 'ceg_ch3schlamphur', 'ceg_ch3schlprovince', 'ceg_ch3schlclass', 'ceg_info', 'ceg_date'], 'safe'],
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
        $query = FormAutoCeg::find();

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
            'ceg_spjobtype' => $this->ceg_spjobtype,
            'ceg_right' => $this->ceg_right,
            'ceg_feetype' => $this->ceg_feetype,
            'ceg_ch1birth' => $this->ceg_ch1birth,
            'ceg_ch1dadorder' => $this->ceg_ch1dadorder,
            'ceg_ch1momorder' => $this->ceg_ch1momorder,
            'ceg_ch1reporder' => $this->ceg_ch1reporder,
            'ceg_ch1repbirth' => $this->ceg_ch1repbirth,
            'ceg_ch1repdeath' => $this->ceg_ch1repdeath,
            'ceg_ch1fee1' => $this->ceg_ch1fee1,
            'ceg_ch1fee2' => $this->ceg_ch1fee2,
            'ceg_ch2birth' => $this->ceg_ch2birth,
            'ceg_ch2dadorder' => $this->ceg_ch2dadorder,
            'ceg_ch2momorder' => $this->ceg_ch2momorder,
            'ceg_ch2reporder' => $this->ceg_ch2reporder,
            'ceg_ch2repbirth' => $this->ceg_ch2repbirth,
            'ceg_ch2repdeath' => $this->ceg_ch2repdeath,
            'ceg_ch2fee1' => $this->ceg_ch2fee1,
            'ceg_ch2fee2' => $this->ceg_ch2fee2,
            'ceg_ch3birth' => $this->ceg_ch3birth,
            'ceg_ch3dadorder' => $this->ceg_ch3dadorder,
            'ceg_ch3momorder' => $this->ceg_ch3momorder,
            'ceg_ch3reporder' => $this->ceg_ch3reporder,
            'ceg_ch3repbirth' => $this->ceg_ch3repbirth,
            'ceg_ch3repdeath' => $this->ceg_ch3repdeath,
            'ceg_ch3fee1' => $this->ceg_ch3fee1,
            'ceg_ch3fee2' => $this->ceg_ch3fee2,
            'ceg_feeright' => $this->ceg_feeright,
            'ceg_money' => $this->ceg_money,
            'ceg_agree' => $this->ceg_agree,
            'ceg_agreemoney' => $this->ceg_agreemoney,
            'ceg_date' => $this->ceg_date,
            'ceg_stid' => $this->ceg_stid,
        ]);

        $query->andFilterWhere(['like', 'ceg_spname', $this->ceg_spname])
            ->andFilterWhere(['like', 'ceg_spposition', $this->ceg_spposition])
            ->andFilterWhere(['like', 'ceg_spbelong', $this->ceg_spbelong])
            ->andFilterWhere(['like', 'ceg_ch1name', $this->ceg_ch1name])
            ->andFilterWhere(['like', 'ceg_ch1repname', $this->ceg_ch1repname])
            ->andFilterWhere(['like', 'ceg_ch1schl', $this->ceg_ch1schl])
            ->andFilterWhere(['like', 'ceg_ch1schlamphur', $this->ceg_ch1schlamphur])
            ->andFilterWhere(['like', 'ceg_ch1schlprovince', $this->ceg_ch1schlprovince])
            ->andFilterWhere(['like', 'ceg_ch1schlclass', $this->ceg_ch1schlclass])
            ->andFilterWhere(['like', 'ceg_ch2name', $this->ceg_ch2name])
            ->andFilterWhere(['like', 'ceg_ch2repname', $this->ceg_ch2repname])
            ->andFilterWhere(['like', 'ceg_ch2schl', $this->ceg_ch2schl])
            ->andFilterWhere(['like', 'ceg_ch2schlamphur', $this->ceg_ch2schlamphur])
            ->andFilterWhere(['like', 'ceg_ch2schlprovince', $this->ceg_ch2schlprovince])
            ->andFilterWhere(['like', 'ceg_ch2schlclass', $this->ceg_ch2schlclass])
            ->andFilterWhere(['like', 'ceg_ch3name', $this->ceg_ch3name])
            ->andFilterWhere(['like', 'ceg_ch3repname', $this->ceg_ch3repname])
            ->andFilterWhere(['like', 'ceg_ch3schl', $this->ceg_ch3schl])
            ->andFilterWhere(['like', 'ceg_ch3schlamphur', $this->ceg_ch3schlamphur])
            ->andFilterWhere(['like', 'ceg_ch3schlprovince', $this->ceg_ch3schlprovince])
            ->andFilterWhere(['like', 'ceg_ch3schlclass', $this->ceg_ch3schlclass])
            ->andFilterWhere(['like', 'ceg_info', $this->ceg_info]);

        return $dataProvider;
    }
}
