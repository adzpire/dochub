<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\dochub\models\FormAutoExm;

/**
 * FormAutoExmSearch represents the model behind the search form about `backend\modules\dochub\models\FormAutoExm`.
 */
class FormAutoExmSearch extends FormAutoExm
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['exmmain_id', 'exmmain_semester', 'exmmain_stid'], 'integer'],
            [['exmmain_year'], 'safe'],
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
        $query = FormAutoExm::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'exmmain_id' => SORT_DESC,
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
            'exmmain_id' => $this->exmmain_id,
            'exmmain_semester' => $this->exmmain_semester,
            'exmmain_year' => $this->exmmain_year,
            'exmmain_stid' => $this->exmmain_stid,
        ]);

        return $dataProvider;
    }
}
