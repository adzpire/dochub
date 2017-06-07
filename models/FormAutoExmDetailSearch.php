<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\dochub\models\FormAutoExmDetail;

/**
 * FormAutoExmDetailSearch represents the model behind the search form about `backend\modules\dochub\models\FormAutoExmDetail`.
 */
class FormAutoExmDetailSearch extends FormAutoExmDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['exminfo_id', 'exminfo_exmid', 'exminfo_course', 'exminfo_type', 'exminfo_degree', 'exminfo_hour', 'exminfo_stdamount'], 'integer'],
            [['exminfo_fee'], 'number'],
            [['exminfo_note'], 'safe'],
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
        $query = FormAutoExmDetail::find();

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
            'exminfo_id' => $this->exminfo_id,
            'exminfo_exmid' => $this->exminfo_exmid,
            'exminfo_course' => $this->exminfo_course,
            'exminfo_type' => $this->exminfo_type,
            'exminfo_degree' => $this->exminfo_degree,
            'exminfo_hour' => $this->exminfo_hour,
            'exminfo_stdamount' => $this->exminfo_stdamount,
            'exminfo_fee' => $this->exminfo_fee,
        ]);

        $query->andFilterWhere(['like', 'exminfo_note', $this->exminfo_note]);

        return $dataProvider;
    }
}
