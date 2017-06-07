<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\dochub\models\FormAutoUnplnbdgtdetail;

/**
 * FormAutoUnplnbdgtdetailSearch represents the model behind the search form about `backend\modules\dochub\models\FormAutoUnplnbdgtdetail`.
 */
class FormAutoUnplnbdgtdetailSearch extends FormAutoUnplnbdgtdetail
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
            [['id', 'unpbdgtdet_unpbid', 'unpbdgtdet_amount', 'unpbdgtdet_xpecprice', 'unpbdgtdet_price'], 'integer'],
            [['unpbdgtdet_title', 'unpbdgtdet_unit'], 'safe'],
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
        $query = FormAutoUnplnbdgtdetail::find();

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
            'id' => $this->id,
            'unpbdgtdet_unpbid' => $this->unpbdgtdet_unpbid,
            'unpbdgtdet_amount' => $this->unpbdgtdet_amount,
            'unpbdgtdet_xpecprice' => $this->unpbdgtdet_xpecprice,
            'unpbdgtdet_price' => $this->unpbdgtdet_price,
        ]);

        $query->andFilterWhere(['like', 'unpbdgtdet_title', $this->unpbdgtdet_title])
            ->andFilterWhere(['like', 'unpbdgtdet_unit', $this->unpbdgtdet_unit]);

        return $dataProvider;
    }
}
