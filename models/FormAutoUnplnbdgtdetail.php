<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "form_auto_unplnbdgtdetail".
 *
 
 * @property integer $id
 * @property integer $unpbdgtdet_unpbid
 * @property string $unpbdgtdet_title
 * @property integer $unpbdgtdet_amount
 * @property string $unpbdgtdet_unit
 * @property integer $unpbdgtdet_xpecprice
 * @property integer $unpbdgtdet_price
 * @property FormAutoUnplnbdgt $unpbdgtdetUnpb
 */
class FormAutoUnplnbdgtdetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_auto_unplnbdgtdetail';
    }
public $unpbdgtdetUnpbName; 
/*add rule in [safe]
'unpbdgtdetUnpbName', 
join in searh()
$query->joinWith(['unpbdgtdetUnpb', ]);*/    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['unpbdgtdet_unpbid', 'unpbdgtdet_title', 'unpbdgtdet_unit', 'unpbdgtdet_amount', 'unpbdgtdet_xpecprice'], 'required'],
            [['unpbdgtdet_unpbid', 'unpbdgtdet_amount', 'unpbdgtdet_xpecprice', 'unpbdgtdet_price'], 'integer'],
            [['unpbdgtdet_title', 'unpbdgtdet_unit'], 'string', 'max' => 255],
            [['unpbdgtdet_unpbid'], 'exist', 'skipOnError' => true, 'targetClass' => FormAutoUnplnbdgt::className(), 'targetAttribute' => ['unpbdgtdet_unpbid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'unpbdgtdet_unpbid' => 'unpID',
            'unpbdgtdet_title' => 'รายการ',
            'unpbdgtdet_amount' => 'จำนวนหน่วย',
            'unpbdgtdet_unit' => 'หน่วยนับ',
            'unpbdgtdet_xpecprice' => 'ราคาที่สืบทราบ(ต่อหน่วย)',
            'unpbdgtdet_price' => 'ราคารวม',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnpbdgtdetUnpb()
    {
        return $this->hasOne(FormAutoUnplnbdgt::className(), ['id' => 'unpbdgtdet_unpbid']);
		
			/*
			$dataProvider->sort->attributes['unpbdgtdetUnpbName'] = [
				'asc' => ['form_auto_unplnbdgt.name' => SORT_ASC],
				'desc' => ['form_auto_unplnbdgt.name' => SORT_DESC],
			];
			
			->andFilterWhere(['like', 'form_auto_unplnbdgt.name', $this->unpbdgtdetUnpbName])
			->orFilterWhere(['like', 'form_auto_unplnbdgt.name1', $this->unpbdgtdetUnpbName])
						in grid
			[
				'attribute' => 'unpbdgtdetUnpbName',
				'value' => 'unpbdgtdetUnpb.name',
				'label' => $searchModel->attributeLabels()['unpbdgtdet_unpbid'],
				'filter' => \FormAutoUnplnbdgt::unpbdgtdetUnpbList,
			],
			
			in view
			[
				'label' => $model->attributeLabels()['unpbdgtdet_unpbid'],
				'value' => $model->unpbdgtdetUnpb->name,
				//'format' => ['date', 'long']
			],
			*/
    }

public static function getFormAutoUnplnbdgtdetailList(){
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
