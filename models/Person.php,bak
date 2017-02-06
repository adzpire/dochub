<?php

namespace backend\modules\dochub\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 
 * @property integer $user_id
 * @property integer $status
 * @property integer $position_id
 * @property integer $title_id
 * @property integer $phd
 * @property string $firstname_th
 * @property string $lastname_th
 * @property string $firstname_en
 * @property string $lastname_en
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property InvtCheck[] $invtChecks
 * @property InvtCheck[] $invtChecks0
 * @property InvtCheckcommit[] $invtCheckcommits
 * @property InvtCheckcommit[] $invtCheckcommits0
 * @property InvtCheckcommit[] $invtCheckcommits1
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

public $invtChecksName; 
public $invtChecks0Name; 
public $invtCheckcommitsName; 
public $invtCheckcommits0Name; 
public $invtCheckcommits1Name; 
/*add rule in [safe]
'invtChecksName', 'invtChecks0Name', 'invtCheckcommitsName', 'invtCheckcommits0Name', 'invtCheckcommits1Name', 
join in searh()
$query->joinWith(['invtChecks', 'invtChecks0', 'invtCheckcommits', 'invtCheckcommits0', 'invtCheckcommits1', ]);*/
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'status', 'position_id', 'title_id', 'firstname_th', 'lastname_th', 'firstname_en', 'lastname_en', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['user_id', 'status', 'position_id', 'title_id', 'phd', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['firstname_th', 'lastname_th', 'firstname_en', 'lastname_en'], 'string', 'max' => 100],
            [['user_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User Id',
            'status' => 'Status',
            'position_id' => 'Position',
            'title_id' => 'Title',
            'phd' => 'Ph.D',
            'firstname_th' => 'First name TH',
            'lastname_th' => 'Last name TH',
            'firstname_en' => 'First name EN',
            'lastname_en' => 'Last name EN',
            'created_at' => 'Created at',
            'updated_at' => 'Updated at',
            'created_by' => 'Created by',
            'updated_by' => 'Updated by',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvtChecks()
    {
        return $this->hasMany(InvtCheck::className(), ['created_by' => 'user_id']);
		
			/*
			$dataProvider->sort->attributes['invtChecksName'] = [
				'asc' => ['person.name' => SORT_ASC],
				'desc' => ['person.name' => SORT_DESC],
			];
			
			->andFilterWhere(['like', 'person.name', $this->invtChecksName])
			->orFilterWhere(['like', 'person.name1', $this->invtChecksName])
						in grid
			[
				'attribute' => 'invtChecksName',
				'value' => 'invtChecks.name',
				'label' => $searchModel->attributeLabels()['user_id']],
				'filter' => \InvtCheck::invtChecksList,
			],
			
			in view
			[
				'label' => $model->attributeLabels()[''user_id']'],
				'value' => $model->invtChecks->name,
				//'format' => ['date', 'long']
			],
			*/
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvtChecks0()
    {
        return $this->hasMany(InvtCheck::className(), ['updated_by' => 'user_id']);
		
			/*
			$dataProvider->sort->attributes['invtChecks0Name'] = [
				'asc' => ['person.name' => SORT_ASC],
				'desc' => ['person.name' => SORT_DESC],
			];
			
			->andFilterWhere(['like', 'person.name', $this->invtChecks0Name])
			->orFilterWhere(['like', 'person.name1', $this->invtChecks0Name])
						in grid
			[
				'attribute' => 'invtChecks0Name',
				'value' => 'invtChecks0.name',
				'label' => $searchModel->attributeLabels()['user_id']],
				'filter' => \InvtCheck::invtChecks0List,
			],
			
			in view
			[
				'label' => $model->attributeLabels()[''user_id']'],
				'value' => $model->invtChecks0->name,
				//'format' => ['date', 'long']
			],
			*/
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvtCheckcommits()
    {
        return $this->hasMany(InvtCheckcommit::className(), ['user_id' => 'user_id']);
		
			/*
			$dataProvider->sort->attributes['invtCheckcommitsName'] = [
				'asc' => ['person.name' => SORT_ASC],
				'desc' => ['person.name' => SORT_DESC],
			];
			
			->andFilterWhere(['like', 'person.name', $this->invtCheckcommitsName])
			->orFilterWhere(['like', 'person.name1', $this->invtCheckcommitsName])
						in grid
			[
				'attribute' => 'invtCheckcommitsName',
				'value' => 'invtCheckcommits.name',
				'label' => $searchModel->attributeLabels()['user_id']],
				'filter' => \InvtCheckcommit::invtCheckcommitsList,
			],
			
			in view
			[
				'label' => $model->attributeLabels()[''user_id']'],
				'value' => $model->invtCheckcommits->name,
				//'format' => ['date', 'long']
			],
			*/
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvtCheckcommits0()
    {
        return $this->hasMany(InvtCheckcommit::className(), ['created_by' => 'user_id']);
		
			/*
			$dataProvider->sort->attributes['invtCheckcommits0Name'] = [
				'asc' => ['person.name' => SORT_ASC],
				'desc' => ['person.name' => SORT_DESC],
			];
			
			->andFilterWhere(['like', 'person.name', $this->invtCheckcommits0Name])
			->orFilterWhere(['like', 'person.name1', $this->invtCheckcommits0Name])
						in grid
			[
				'attribute' => 'invtCheckcommits0Name',
				'value' => 'invtCheckcommits0.name',
				'label' => $searchModel->attributeLabels()['user_id']],
				'filter' => \InvtCheckcommit::invtCheckcommits0List,
			],
			
			in view
			[
				'label' => $model->attributeLabels()[''user_id']'],
				'value' => $model->invtCheckcommits0->name,
				//'format' => ['date', 'long']
			],
			*/
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvtCheckcommits1()
    {
        return $this->hasMany(InvtCheckcommit::className(), ['updated_by' => 'user_id']);
		
			/*
			$dataProvider->sort->attributes['invtCheckcommits1Name'] = [
				'asc' => ['person.name' => SORT_ASC],
				'desc' => ['person.name' => SORT_DESC],
			];
			
			->andFilterWhere(['like', 'person.name', $this->invtCheckcommits1Name])
			->orFilterWhere(['like', 'person.name1', $this->invtCheckcommits1Name])
						in grid
			[
				'attribute' => 'invtCheckcommits1Name',
				'value' => 'invtCheckcommits1.name',
				'label' => $searchModel->attributeLabels()['user_id']],
				'filter' => \InvtCheckcommit::invtCheckcommits1List,
			],
			
			in view
			[
				'label' => $model->attributeLabels()[''user_id']'],
				'value' => $model->invtCheckcommits1->name,
				//'format' => ['date', 'long']
			],
			*/
    }

public function getPersonList(){
		return ArrayHelper::map(self::find()->all(), 'id', 'title');
	}

/*
public static function itemsAlias($key) {
        $items = [
            'status' => [
                0 => Yii::t('app', 'ร่าง'),
                1 => Yii::t('app', 'เสนอ'),
                2 => Yii::t('app', 'อนุมัติ'),
                3 => Yii::t('app', 'ไม่อนุมัติ'),
                4 => Yii::t('app', 'คืนแล้ว'),
            ],
            'statusCondition'=>[
                1 => Yii::t('app', 'อนุมัติ'),
                0 => Yii::t('app', 'ไม่อนุมัติ'),
            ]
        ];
        return ArrayHelper::getValue($items, $key, []);
    }

    public function getStatusLabel() {
        $status = ArrayHelper::getValue($this->getItemStatus(), $this->status);
        $status = ($this->status === NULL) ? ArrayHelper::getValue($this->getItemStatus(), 0) : $status;
        switch ($this->status) {
            case 0 :
            case NULL :
                $str = '<span class="label label-warning">' . $status . '</span>';
                break;
            case 1 :
                $str = '<span class="label label-primary">' . $status . '</span>';
                break;
            case 2 :
                $str = '<span class="label label-success">' . $status . '</span>';
                break;
            case 3 :
                $str = '<span class="label label-danger">' . $status . '</span>';
                break;
            case 4 :
                $str = '<span class="label label-succes">' . $status . '</span>';
                break;
            default :
                $str = $status;
                break;
        }

        return $str;
    }

    public static function getItemStatus() {
        return self::itemsAlias('status');
    }
    
    public static function getItemStatusConsider() {
        return self::itemsAlias('statusCondition');       
    }
*/
}
