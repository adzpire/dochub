<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\helpers\ArrayHelper;
use backend\modules\person\models\Person;
/**
 * This is the model class for table "form_auto_brrvmn".
 *
 
 * @property integer $id
 * @property integer $user_id
 * @property integer $amount
 * @property string $reason
 * @property Person $user
 * @property Person $createdBy
 * @property Person $updatedBy
 */
class FormAutoBrrvmn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_auto_brrvmn';
    }

    public static function fn()
    {
        return [
            'code' => 'revolvmoney',
            'name' => Yii::t('app', 'ขออนุมัติยืมเงินหมุนเวียน'),
            'icon' => 'retweet',
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($insert) {

//        $month= "+".$this->duration_in_months." month";
//        $this->exp_date=date("Y-m-d H:i:s",strtotime($month));
//        $this->save(['exp_date']);
            $ssmdl = new FormAutoSession();
            $ssmdl->fss_fid = $this->id;
            $ssmdl->fss_type = self::fn()['code'];
            //$ssmdl->save();
            if ($ssmdl->save()) {
            } else {
                print_r($ssmdl->getErrors());
                exit;
            }
        } else {
            $ssmdl = FormAutoSession::find()->where(['fss_fid' => $this->id, 'fss_type' => self::fn()['code']])->one();
            $ssmdl->updated_at = null;
            $ssmdl->updated_by = null;
            $ssmdl->save();
        }
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $model = FormAutoSession::find()->where(['fss_fid' => $this->id, 'fss_type' => self::fn()['code']])->one();
            $model->delete();
            return true;
        } else {
            return false;
        }
    }

public $userName; 
public $createdByName; 
public $updatedByName; 
/*add rule in [safe]
'userName', 'createdByName', 'updatedByName', 
join in searh()
$query->joinWith(['user', 'createdBy', 'updatedBy', ]);*/
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'amount', 'reason'], 'required'],
            [['user_id', 'amount'], 'integer'],
            [['reason'], 'string'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'ผู้ขอ',
            'amount' => 'จำนวนเงิน',
            'reason' => 'เหตุผล',
        ];
    }

    public function getSs()
    {
        return $this->hasOne(FormAutoSession::className(), ['fss_fid' => 'id'])->where(['fss_type' => self::fn()['code']]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'user_id']);
		
			/*
			$dataProvider->sort->attributes['userName'] = [
				'asc' => ['person.name' => SORT_ASC],
				'desc' => ['person.name' => SORT_DESC],
			];
			
			->andFilterWhere(['like', 'person.name', $this->userName])
			->orFilterWhere(['like', 'person.name1', $this->userName])
						in grid
			[
				'attribute' => 'userName',
				'value' => 'user.name',
				'label' => $searchModel->attributeLabels()['user_id'],
				'filter' => \Person::userList,
			],
			*/
    }

public function getFormAutoBrrvmnList(){
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
