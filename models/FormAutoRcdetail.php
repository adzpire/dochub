<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "form_auto_rcdetail".
 *
 
 * @property integer $rcd_id
 * @property integer $rcd_rcid
 * @property string $rcd_detail
 * @property integer $rcd_amount
 * @property FormAutoRc $rcdRc
 */
class FormAutoRcdetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_auto_rcdetail';
    }

public $rcdRcName; 
/*add rule in [safe]
'rcdRcName', 
join in searh()
$query->joinWith(['rcdRc', ]);*/
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rcd_rcid', 'rcd_amount'], 'required'],
            [['rcd_rcid', 'rcd_amount'], 'integer'],
            [['rcd_detail'], 'string', 'max' => 255],
            [['rcd_rcid'], 'exist', 'skipOnError' => true, 'targetClass' => FormAutoRc::className(), 'targetAttribute' => ['rcd_rcid' => 'fid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rcd_id' => 'ID',
            'rcd_rcid' => 'rcID',
            'rcd_detail' => 'รายการ',
            'rcd_amount' => 'จำนวนเงิน',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRcdRc()
    {
        return $this->hasOne(FormAutoRc::className(), ['fid' => 'rcd_rcid']);
		
			/*
			$dataProvider->sort->attributes['rcdRcName'] = [
				'asc' => ['form_auto_rc.name' => SORT_ASC],
				'desc' => ['form_auto_rc.name' => SORT_DESC],
			];
			
			->andFilterWhere(['like', 'form_auto_rc.name', $this->rcdRcName])
			->orFilterWhere(['like', 'form_auto_rc.name1', $this->rcdRcName])
						in grid
			[
				'attribute' => 'rcdRcName',
				'value' => 'rcdRc.name',
				'label' => $searchModel->attributeLabels()['rcd_rcid']],
				'filter' => \FormAutoRc::rcdRcList,
			],
			*/
    }

public function getFormAutoRcdetailList(){
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
