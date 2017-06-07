<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\dochub\models\FormAutoCe;

/**
 * FormAutoCeSearch represents the model behind the search form about `backend\modules\dochub\models\FormAutoCe`.
 */
class FormAutoCeSearch extends FormAutoCe
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fid', 'ce_spjobtype', 'ce_hasbright', 'ce_feetype', 'ce_ch1dadorder', 'ce_ch1momorder', 'ce_ch1reporder', 'ce_ch1fee1', 'ce_ch1fee2', 'ce_ch2dadorder', 'ce_ch2momorder', 'ce_ch2reporder', 'ce_ch2fee1', 'ce_ch2fee2', 'ce_ch3dadorder', 'ce_ch3momorder', 'ce_ch3reporder', 'ce_ch3fee1', 'ce_ch3fee2', 'ce_whole', 'ce_half', 'ce_piece', 'ce_sum', 'ce_agree', 'ce_agreemoney', 'ce_stid'], 'integer'],
            [['ce_spname', 'ce_spposition', 'ce_spbelong', 'ce_ch1name', 'ce_ch1birth', 'ce_ch1repname', 'ce_ch1repbirth', 'ce_ch1repdeath', 'ce_ch1schl', 'ce_ch1schlamphur', 'ce_ch1schlprovince', 'ce_ch1schlclass', 'ce_ch2name', 'ce_ch2birth', 'ce_ch2repname', 'ce_ch2repbirth', 'ce_ch2repdeath', 'ce_ch2schl', 'ce_ch2schlamphur', 'ce_ch2schlprovince', 'ce_ch2schlclass', 'ce_ch3name', 'ce_ch3birth', 'ce_ch3repname', 'ce_ch3repbirth', 'ce_ch3repdeath', 'ce_ch3schl', 'ce_ch3schlamphur', 'ce_ch3schlprovince', 'ce_ch3schlclass', 'ce_date', 'ce_accname', 'ce_accnum'], 'safe'],
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
        $query = FormAutoCe::find();

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
            'ce_spjobtype' => $this->ce_spjobtype,
            'ce_hasbright' => $this->ce_hasbright,
            'ce_feetype' => $this->ce_feetype,
            'ce_ch1birth' => $this->ce_ch1birth,
            'ce_ch1dadorder' => $this->ce_ch1dadorder,
            'ce_ch1momorder' => $this->ce_ch1momorder,
            'ce_ch1reporder' => $this->ce_ch1reporder,
            'ce_ch1repbirth' => $this->ce_ch1repbirth,
            'ce_ch1repdeath' => $this->ce_ch1repdeath,
            'ce_ch1fee1' => $this->ce_ch1fee1,
            'ce_ch1fee2' => $this->ce_ch1fee2,
            'ce_ch2birth' => $this->ce_ch2birth,
            'ce_ch2dadorder' => $this->ce_ch2dadorder,
            'ce_ch2momorder' => $this->ce_ch2momorder,
            'ce_ch2reporder' => $this->ce_ch2reporder,
            'ce_ch2repbirth' => $this->ce_ch2repbirth,
            'ce_ch2repdeath' => $this->ce_ch2repdeath,
            'ce_ch2fee1' => $this->ce_ch2fee1,
            'ce_ch2fee2' => $this->ce_ch2fee2,
            'ce_ch3birth' => $this->ce_ch3birth,
            'ce_ch3dadorder' => $this->ce_ch3dadorder,
            'ce_ch3momorder' => $this->ce_ch3momorder,
            'ce_ch3reporder' => $this->ce_ch3reporder,
            'ce_ch3repbirth' => $this->ce_ch3repbirth,
            'ce_ch3repdeath' => $this->ce_ch3repdeath,
            'ce_ch3fee1' => $this->ce_ch3fee1,
            'ce_ch3fee2' => $this->ce_ch3fee2,
            'ce_whole' => $this->ce_whole,
            'ce_half' => $this->ce_half,
            'ce_piece' => $this->ce_piece,
            'ce_sum' => $this->ce_sum,
            'ce_agree' => $this->ce_agree,
            'ce_agreemoney' => $this->ce_agreemoney,
            'ce_date' => $this->ce_date,
            'ce_stid' => $this->ce_stid,
        ]);

        $query->andFilterWhere(['like', 'ce_spname', $this->ce_spname])
            ->andFilterWhere(['like', 'ce_spposition', $this->ce_spposition])
            ->andFilterWhere(['like', 'ce_spbelong', $this->ce_spbelong])
            ->andFilterWhere(['like', 'ce_ch1name', $this->ce_ch1name])
            ->andFilterWhere(['like', 'ce_ch1repname', $this->ce_ch1repname])
            ->andFilterWhere(['like', 'ce_ch1schl', $this->ce_ch1schl])
            ->andFilterWhere(['like', 'ce_ch1schlamphur', $this->ce_ch1schlamphur])
            ->andFilterWhere(['like', 'ce_ch1schlprovince', $this->ce_ch1schlprovince])
            ->andFilterWhere(['like', 'ce_ch1schlclass', $this->ce_ch1schlclass])
            ->andFilterWhere(['like', 'ce_ch2name', $this->ce_ch2name])
            ->andFilterWhere(['like', 'ce_ch2repname', $this->ce_ch2repname])
            ->andFilterWhere(['like', 'ce_ch2schl', $this->ce_ch2schl])
            ->andFilterWhere(['like', 'ce_ch2schlamphur', $this->ce_ch2schlamphur])
            ->andFilterWhere(['like', 'ce_ch2schlprovince', $this->ce_ch2schlprovince])
            ->andFilterWhere(['like', 'ce_ch2schlclass', $this->ce_ch2schlclass])
            ->andFilterWhere(['like', 'ce_ch3name', $this->ce_ch3name])
            ->andFilterWhere(['like', 'ce_ch3repname', $this->ce_ch3repname])
            ->andFilterWhere(['like', 'ce_ch3schl', $this->ce_ch3schl])
            ->andFilterWhere(['like', 'ce_ch3schlamphur', $this->ce_ch3schlamphur])
            ->andFilterWhere(['like', 'ce_ch3schlprovince', $this->ce_ch3schlprovince])
            ->andFilterWhere(['like', 'ce_ch3schlclass', $this->ce_ch3schlclass])
            ->andFilterWhere(['like', 'ce_accname', $this->ce_accname])
            ->andFilterWhere(['like', 'ce_accnum', $this->ce_accnum]);

        return $dataProvider;
    }
}
