<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "form_auto_session".
 *
 
 * @property integer $fss_id
 * @property integer $fss_fid
 * @property string $fss_type
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 * @property Person $createdBy
 * @property Person $updatedBy
 */
class FormAutoSession extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_auto_session';
    }
    public function behaviors()
    {
        return [
            BlameableBehavior::className(),
            TimestampBehavior::className(),
        ];
    }
public $createdByName; 
public $updatedByName; 
/*add rule in [safe]
'createdByName', 'updatedByName', 
join in searh()
$query->joinWith(['createdBy', 'updatedBy', ]);*/    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fss_fid', 'fss_type', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'required'],
            [['fss_fid', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['fss_type'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['created_by' => 'user_id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['updated_by' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fss_id' => 'ID',
            'fss_fid' => 'formID',
            'fss_type' => 'formtype',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'created_by']);
		
			/*
			$dataProvider->sort->attributes['createdByName'] = [
				'asc' => ['person.name' => SORT_ASC],
				'desc' => ['person.name' => SORT_DESC],
			];
			
			->andFilterWhere(['like', 'person.name', $this->createdByName])
			->orFilterWhere(['like', 'person.name1', $this->createdByName])
						in grid
			[
				'attribute' => 'createdByName',
				'value' => 'createdBy.name',
				'label' => $searchModel->attributeLabels()['created_by'],
				'filter' => \Person::createdByList,
			],
			
			in view
			[
				'label' => $model->attributeLabels()['created_by'],
				'value' => $model->createdBy->name,
				//'format' => ['date', 'long']
			],
			*/
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'updated_by']);
		
			/*
			$dataProvider->sort->attributes['updatedByName'] = [
				'asc' => ['person.name' => SORT_ASC],
				'desc' => ['person.name' => SORT_DESC],
			];
			
			->andFilterWhere(['like', 'person.name', $this->updatedByName])
			->orFilterWhere(['like', 'person.name1', $this->updatedByName])
						in grid
			[
				'attribute' => 'updatedByName',
				'value' => 'updatedBy.name',
				'label' => $searchModel->attributeLabels()['updated_by'],
				'filter' => \Person::updatedByList,
			],
			
			in view
			[
				'label' => $model->attributeLabels()['updated_by'],
				'value' => $model->updatedBy->name,
				//'format' => ['date', 'long']
			],
			*/
    }

public static function getFormAutoSessionList(){
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
