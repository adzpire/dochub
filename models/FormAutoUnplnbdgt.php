<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\helpers\ArrayHelper;
use backend\modules\person\models\Person;
/**
 * This is the model class for table "form_auto_unplnbdgt".
 *
 
 * @property integer $id
 * @property integer $unpbdgt_stid
 * @property string $unpbdgt_date
 * @property string $unpbdgt_job
 * @property string $unpbdgt_material
 * @property string $unpbdgt_reason
 * @property integer $unpbdgt_tax
 * @property Person $unpbdgtSt
 * @property FormAutoUnplnbdgtdetail[] $formAutoUnplnbdgtdetails
 */
class FormAutoUnplnbdgt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_auto_unplnbdgt';
    }
    public static function fn()
    {
        //return ['unplanbudget' => Yii::t('app', 'ขออนุมัติจัดซื้อพัสดุนอกแผนการจัดซื้อประจำปี')];
        return [
            'code' => 'unplanbudget',
            'name' => Yii::t('app', 'ขออนุมัติจัดซื้อพัสดุนอกแผนการจัดซื้อประจำปี'),
            'icon' => 'bitcoin',
        ];
    }
public $unpbdgtStName; 
public $formAutoUnplnbdgtdetailsName; 
/*add rule in [safe]
'unpbdgtStName', 'formAutoUnplnbdgtdetailsName', 
join in searh()
$query->joinWith(['unpbdgtSt', 'formAutoUnplnbdgtdetails', ]);*/
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($insert) {

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
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['unpbdgt_stid', 'unpbdgt_date', 'unpbdgt_job', 'unpbdgt_year', 'unpbdgt_reason'], 'required'],
            [['unpbdgt_tax'], 'required', 'on' => 'updatetax'],
            [['unpbdgt_stid', 'unpbdgt_tax'], 'integer'],
            [['unpbdgt_date', 'unpbdgt_year'], 'safe'],
            [['unpbdgt_reason'], 'string'],
            ['unpbdgt_tax', 'boolean'],
            [['unpbdgt_job'], 'string', 'max' => 255],
            [['unpbdgt_stid'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['unpbdgt_stid' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'unpbdgt_stid' => 'StaffID',
            'unpbdgt_date' => 'วันที่',
            'unpbdgt_job' => 'ด้วยงาน',
            'unpbdgt_year' => 'ปีงบประมาณ',
            'unpbdgt_reason' => 'เพื่อใช้สำหรับ',
            'unpbdgt_tax' => 'คิดภาษี',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnpbdgtSt()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'unpbdgt_stid']);
		
			/*
			$dataProvider->sort->attributes['unpbdgtStName'] = [
				'asc' => ['person.name' => SORT_ASC],
				'desc' => ['person.name' => SORT_DESC],
			];
			
			->andFilterWhere(['like', 'person.name', $this->unpbdgtStName])
			->orFilterWhere(['like', 'person.name1', $this->unpbdgtStName])
						in grid
			[
				'attribute' => 'unpbdgtStName',
				'value' => 'unpbdgtSt.name',
				'label' => $searchModel->attributeLabels()['unpbdgt_stid'],
				'filter' => \Person::unpbdgtStList,
			],
			
			in view
			[
				'label' => $model->attributeLabels()['unpbdgt_stid'],
				'value' => $model->unpbdgtSt->name,
				//'format' => ['date', 'long']
			],
			*/
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormAutoUnplnbdgtdetails()
    {
        return $this->hasMany(FormAutoUnplnbdgtdetail::className(), ['unpbdgtdet_unpbid' => 'id']);
		
			/*
			$dataProvider->sort->attributes['formAutoUnplnbdgtdetailsName'] = [
				'asc' => ['form_auto_unplnbdgt.name' => SORT_ASC],
				'desc' => ['form_auto_unplnbdgt.name' => SORT_DESC],
			];
			
			->andFilterWhere(['like', 'form_auto_unplnbdgt.name', $this->formAutoUnplnbdgtdetailsName])
			->orFilterWhere(['like', 'form_auto_unplnbdgt.name1', $this->formAutoUnplnbdgtdetailsName])
						in grid
			[
				'attribute' => 'formAutoUnplnbdgtdetailsName',
				'value' => 'formAutoUnplnbdgtdetails.name',
				'label' => $searchModel->attributeLabels()['id'],
				'filter' => \FormAutoUnplnbdgtdetail::formAutoUnplnbdgtdetailsList,
			],
			
			in view
			[
				'label' => $model->attributeLabels()['id'],
				'value' => $model->formAutoUnplnbdgtdetails->name,
				//'format' => ['date', 'long']
			],
			*/
    }

public static function getFormAutoUnplnbdgtList(){
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
