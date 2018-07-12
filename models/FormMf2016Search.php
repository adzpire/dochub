<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\dochub\models\FormMf2016;

/**
 * FormMf2016Search represents the model behind the search form about `backend\modules\dochub\models\FormMf2016`.
 */
class FormMf2016Search extends FormMf2016
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
            [['fid', 'mf_stid', 'mf_want', 'mf_choice'], 'integer'],
            [['mf_ill', 'mf_hospital', 'mf_date'], 'safe'],
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
        $query = FormMf2016::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            /*'pagination' => false,
            'sort' => false,*/
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
            'mf_stid' => $this->mf_stid,
            'mf_want' => $this->mf_want,
            'mf_choice' => $this->mf_choice,
            'mf_date' => $this->mf_date,
        ]);

        $query->andFilterWhere(['like', 'mf_ill', $this->mf_ill])
            ->andFilterWhere(['like', 'mf_hospital', $this->mf_hospital]);

        return $dataProvider;
    }
}
