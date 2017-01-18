<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\dochub\models\FormAutoBrmn;

/**
 * FormAutoBrmnSearch represents the model behind the search form about `backend\modules\dochub\models\FormAutoBrmn`.
 */
class FormAutoBrmnSearch extends FormAutoBrmn
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
            [['brmn_id', 'brmn_stid', 'brmn_salary', 'brmn_borrow', 'brmn_choice'], 'integer'],
            [['brmn_other', 'brmn_title', 'brmn_place', 'brmn_bdate', 'brmn_edate'], 'safe'],
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
        $query = FormAutoBrmn::find();

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
            'brmn_id' => $this->brmn_id,
            'brmn_stid' => $this->brmn_stid,
            'brmn_salary' => $this->brmn_salary,
            'brmn_borrow' => $this->brmn_borrow,
            'brmn_choice' => $this->brmn_choice,
            'brmn_bdate' => $this->brmn_bdate,
            'brmn_edate' => $this->brmn_edate,
        ]);

        $query->andFilterWhere(['like', 'brmn_other', $this->brmn_other])
            ->andFilterWhere(['like', 'brmn_title', $this->brmn_title])
            ->andFilterWhere(['like', 'brmn_place', $this->brmn_place]);

        return $dataProvider;
    }
}
