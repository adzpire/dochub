<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\dochub\models\FormAutoHirbdgtdetail;

/**
 * FormAutoHirbdgtdetailSearch represents the model behind the search form about `backend\modules\dochub\models\FormAutoHirbdgtdetail`.
 */
class FormAutoHirbdgtdetailSearch extends FormAutoHirbdgtdetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hbdgtdet_id', 'hbdgtdet_hbid', 'hbdgtdet_amount', 'hbdgtdet_xpecprice', 'hbdgtdet_price'], 'integer'],
            [['hbdgtdet_title', 'hbdgtdet_unit'], 'safe'],
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
        $query = FormAutoHirbdgtdetail::find();

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
            'hbdgtdet_id' => $this->hbdgtdet_id,
            'hbdgtdet_hbid' => $this->hbdgtdet_hbid,
            'hbdgtdet_amount' => $this->hbdgtdet_amount,
            'hbdgtdet_xpecprice' => $this->hbdgtdet_xpecprice,
            'hbdgtdet_price' => $this->hbdgtdet_price,
        ]);

        $query->andFilterWhere(['like', 'hbdgtdet_title', $this->hbdgtdet_title])
            ->andFilterWhere(['like', 'hbdgtdet_unit', $this->hbdgtdet_unit]);

        return $dataProvider;
    }
}
