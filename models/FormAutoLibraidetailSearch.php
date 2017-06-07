<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\dochub\models\FormAutoLibraidetail;

/**
 * FormAutoLibraidetailSearch represents the model behind the search form about `backend\modules\dochub\models\FormAutoLibraidetail`.
 */
class FormAutoLibraidetailSearch extends FormAutoLibraidetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['libraidet_id', 'libraidet_mainid', 'libraidet_recptno', 'libraidet_amount'], 'integer'],
            [['libraidet_org'], 'safe'],
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
        $query = FormAutoLibraidetail::find();

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
            'libraidet_id' => $this->libraidet_id,
            'libraidet_mainid' => $this->libraidet_mainid,
            'libraidet_recptno' => $this->libraidet_recptno,
            'libraidet_amount' => $this->libraidet_amount,
        ]);

        $query->andFilterWhere(['like', 'libraidet_org', $this->libraidet_org]);

        return $dataProvider;
    }
}
