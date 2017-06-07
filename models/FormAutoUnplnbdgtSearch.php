<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\dochub\models\FormAutoUnplnbdgt;

/**
 * FormAutoUnplnbdgtSearch represents the model behind the search form about `backend\modules\dochub\models\FormAutoUnplnbdgt`.
 */
class FormAutoUnplnbdgtSearch extends FormAutoUnplnbdgt
{
    /**
     * @inheritdoc
     */
	  
	 /* adzpire gridview relation sort-filter
		public $weu;
		public $wecr;
	 
		add rule
		[['weu', 'wecr'], 'safe'],

		in function search()  //weU = wasterecycle_user userPro = user_profile
		$query->joinWith(['weU', 'weCr.userPro']); // weCr.userPro - 2layer relation
		$dataProvider->sort->attributes['weu'] = [
			'asc' => ['wasterecycle_user.wu_name' => SORT_ASC],
			'desc' => ['wasterecycle_user.wu_name' => SORT_DESC],
		];
		$dataProvider->sort->attributes['wecr'] = [
			'asc' => ['user_profile.firstname' => SORT_ASC],
			'desc' => ['user_profile.firstname' => SORT_DESC],
		];
		//add grid filter condition ->orFilterWhere for search wu_name or wu_lastname
		->andFilterWhere(['like', 'wasterecycle_user.wu_name', $this->weu])
		->orFilterWhere(['like', 'wasterecycle_user.wu_lastname', $this->weu])
		->andFilterWhere(['like', 'user_profile.firstname', $this->wecr])
		->orFilterWhere(['like', 'user_profile.lastname', $this->wecr]);
        
	 */
    public function rules()
    {
        return [
            [['id', 'unpbdgt_stid', 'unpbdgt_tax'], 'integer'],
            [['unpbdgt_date', 'unpbdgt_job', 'unpbdgt_year', 'unpbdgt_reason'], 'safe'],
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
        $query = FormAutoUnplnbdgt::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
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
            'id' => $this->id,
            'unpbdgt_stid' => $this->unpbdgt_stid,
            'unpbdgt_date' => $this->unpbdgt_date,
            //'unpbdgt_material' => $this->unpbdgt_material,
            'unpbdgt_year' => $this->unpbdgt_year,
            'unpbdgt_tax' => $this->unpbdgt_tax,
        ]);

        $query->andFilterWhere(['like', 'unpbdgt_job', $this->unpbdgt_job])
            ->andFilterWhere(['like', 'unpbdgt_reason', $this->unpbdgt_reason]);

        return $dataProvider;
    }
}
