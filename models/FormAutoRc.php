<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\helpers\ArrayHelper;
use backend\modules\person\models\Person;
use backend\modules\thailocale\models\PersonAddress;
/**
 * This is the model class for table "form_auto_rc".
 *
 
 * @property integer $fid
 * @property integer $rc_paid
 * @property string $rc_getfrom
 * @property integer $rc_stid
 * @property string $rc_date
 * @property Person $rcSt
 * @property PersonAddress $rcPa
 * @property FormAutoRcdetail[] $formAutoRcdetails
 */
class FormAutoRc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_auto_rc';
    }
    public static function fn()
    {
        return [
            'code' => 'receipt',
            'name' => Yii::t('app', 'แบบฟอร์มใบสำคัญรับเงิน'),
            'icon' => 'bitcoin',
        ];
    }
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            $this->rc_stid = Yii::$app->user->id;
            //$this->rc_paid = ($this->rc_paid == 0) ? NULL : $this->rc_paid;
            return true;
        } else {
            //$this->rc_paid = ($this->rc_paid == 0) ? NULL : $this->rc_paid;
//            exit;
            return false;
        }
    }
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($insert) {

            $ssmdl = new FormAutoSession();
            $ssmdl->fss_fid = $this->fid;
            $ssmdl->fss_type = self::fn()['code'];
            //$ssmdl->save();
            if ($ssmdl->save()) {
            } else {
                print_r($ssmdl->getErrors());
                exit;
            }
        } else {
            $ssmdl = FormAutoSession::find()->where(['fss_fid' => $this->fid, 'fss_type' => self::fn()['code']])->one();
            $ssmdl->updated_at = null;
            $ssmdl->updated_by = null;
            $ssmdl->save();
        }
    }

    public function afterFind()
    {
        //reset the password to null because we don't want the hash to be shown.
        $this->rc_paid = (is_null($this->rc_paid)) ? '' : $this->rc_paid;

        parent::afterFind();
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $model = FormAutoSession::find()->where(['fss_fid' => $this->fid, 'fss_type' => self::fn()['code']])->one();
            $model->delete();
            return true;
        } else {
            return false;
        }
    }
public $rcStName; 
public $rcPaName; 
public $formAutoRcdetailsName; 
/*add rule in [safe]
'rcStName', 'rcPaName', 'formAutoRcdetailsName', 
join in searh()
$query->joinWith(['rcSt', 'rcPa', 'formAutoRcdetails', ]);*/
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rc_getfrom', 'rc_date'], 'required'],
            [['rc_stid'], 'integer'],
            [['rc_date'], 'safe'],
            [['rc_getfrom'], 'string', 'max' => 255],
            [['rc_stid'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['rc_stid' => 'user_id']],
            [['rc_paid'], 'exist', 'skipOnEmpty' => true, 'skipOnError' => true, 'targetClass' => PersonAddress::className(), 'targetAttribute' => ['rc_paid' => 'pa_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fid' => 'ID',
            'rc_paid' => 'paID',
            'rc_getfrom' => 'ได้รับเงินจาก',
            'rc_stid' => 'ผู้ทำฟอร์ม',
            'rc_date' => 'วันที่',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRcSt()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'rc_stid']);
		
			/*
			$dataProvider->sort->attributes['rcStName'] = [
				'asc' => ['person.name' => SORT_ASC],
				'desc' => ['person.name' => SORT_DESC],
			];
			
			->andFilterWhere(['like', 'person.name', $this->rcStName])
			->orFilterWhere(['like', 'person.name1', $this->rcStName])
						in grid
			[
				'attribute' => 'rcStName',
				'value' => 'rcSt.name',
				'label' => $searchModel->attributeLabels()['rc_stid']],
				'filter' => \Person::rcStList,
			],
			*/
    }

    public function getSs()
    {
        return $this->hasOne(FormAutoSession::className(), ['fss_fid' => 'fid'])->where(['fss_type' => self::fn()['code']]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRcPa()
    {
        return $this->hasOne(PersonAddress::className(), ['pa_id' => 'rc_paid']);
		
			/*
			$dataProvider->sort->attributes['rcPaName'] = [
				'asc' => ['person_address.name' => SORT_ASC],
				'desc' => ['person_address.name' => SORT_DESC],
			];
			
			->andFilterWhere(['like', 'person_address.name', $this->rcPaName])
			->orFilterWhere(['like', 'person_address.name1', $this->rcPaName])
						in grid
			[
				'attribute' => 'rcPaName',
				'value' => 'rcPa.name',
				'label' => $searchModel->attributeLabels()['rc_paid']],
				'filter' => \PersonAddress::rcPaList,
			],
			*/
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormAutoRcdetails()
    {
        return $this->hasMany(FormAutoRcdetail::className(), ['rcd_rcid' => 'fid']);
		
			/*
			$dataProvider->sort->attributes['formAutoRcdetailsName'] = [
				'asc' => ['form_auto_rc.name' => SORT_ASC],
				'desc' => ['form_auto_rc.name' => SORT_DESC],
			];
			
			->andFilterWhere(['like', 'form_auto_rc.name', $this->formAutoRcdetailsName])
			->orFilterWhere(['like', 'form_auto_rc.name1', $this->formAutoRcdetailsName])
						in grid
			[
				'attribute' => 'formAutoRcdetailsName',
				'value' => 'formAutoRcdetails.name',
				'label' => $searchModel->attributeLabels()['fid']],
				'filter' => \FormAutoRcdetail::formAutoRcdetailsList,
			],
			*/
    }

public function getFormAutoRcList(){
		return ArrayHelper::map(self::find()->all(), 'id', 'title');
	}
    public function getTitleList()
    {
        $data = $this->formAutoRcdetails;
        $doc = '<ul>';
        foreach($data as $book) {
            $doc .= '<li>'.$book->rcd_detail.'</li>';
        }
        $doc .= '</ul>';
        return $doc;
    }
    public function getAmountList()
    {
        $data = $this->formAutoRcdetails;
        $doc = '<ul>';
        foreach($data as $book) {
            $doc .= '<li>'.$book->rcd_amount.'</li>';
        }
        $doc .= '</ul>';
        return $doc;
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
