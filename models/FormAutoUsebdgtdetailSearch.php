<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\dochub\models\FormAutoUsebdgtdetail;

/**
 * FormAutoUsebdgtdetailSearch represents the model behind the search form about `backend\modules\dochub\models\FormAutoUsebdgtdetail`.
 */
class FormAutoUsebdgtdetailSearch extends FormAutoUsebdgtdetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usebdgtdet_id', 'usebdgtdet_ubid', 'usebdgtdet_amount'], 'integer'],
            [['usebdgtdet_title'], 'safe'],
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
        $query = FormAutoUsebdgtdetail::find();

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
            'usebdgtdet_id' => $this->usebdgtdet_id,
            'usebdgtdet_ubid' => $this->usebdgtdet_ubid,
            'usebdgtdet_amount' => $this->usebdgtdet_amount,
        ]);

        $query->andFilterWhere(['like', 'usebdgtdet_title', $this->usebdgtdet_title]);

        return $dataProvider;
    }
}
