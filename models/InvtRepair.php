<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\helpers\ArrayHelper;
use backend\modules\person\models\Person;
use backend\components\ThaibudgetyearWidget;
/**
 * This is the model class for table "invt_repair".
 *
 
 * @property integer $ir_id
 * @property integer $status
 * @property integer $ir_stID
 * @property integer $ir_code
 * @property integer $ir_tchnID
 * @property string $ir_date
 * @property string $ir_tchndate
 * @property Person $irSt
 * @property Person $irTchn
 * @property InvtRepairDetail[] $invtRepairDetails
 */
class InvtRepair extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'invt_repair';
    }

    public static function fn()
    {
        return [
            'code' => 'inventoryrepair',
            'name' => 'แบบแจ้งซ่อมครุภัณฑ์',
            'icon' => 'wrench',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $tmpyearcode = ThaibudgetyearWidget::widget(['date' => $this->ir_date]);
            $short = substr($tmpyearcode,2);
            $tmpsql = self::find()->select('ir_code')->where(['LIKE', 'ir_code', $short.'%', false])->asArray()->all();
            $brndarr = [];
            foreach($tmpsql as $key => $value) {
                $shrt = substr($value['ir_code'],2);
                $shrt = ltrim($shrt, '0');
                array_push($brndarr, $shrt);
            }
            $invID = str_pad(max($brndarr)+1, 3, '0', STR_PAD_LEFT);
//            echo $short.$invID;
            $this->ir_code = $short.$invID;
//            exit();
            return true;
        } else {
            return false;
        }
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($insert) {

            $ssmdl = new FormAutoSession();
            $ssmdl->fss_fid = $this->ir_id;
            $ssmdl->fss_type = self::fn()['code'];
            //$ssmdl->save();
            if ($ssmdl->save()) {
            } else {
                print_r($ssmdl->getErrors());
                exit;
            }
        } else {
            $ssmdl = FormAutoSession::find()->where(['fss_fid' => $this->ir_id, 'fss_type' => self::fn()['code']])->one();
            $ssmdl->updated_at = null;
            $ssmdl->updated_by = null;
            $ssmdl->save();
        }
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {

            $model = FormAutoSession::find()->where(['fss_fid' => $this->ir_id, 'fss_type' => self::fn()['code']])->one();
            $model->delete();
            return true;
        } else {
            return false;
        }
    }

public $irStName; 
public $irTchnName; 
public $invtRepairDetailsName; 
/*add rule in [safe]
'irStName', 'irTchnName', 'invtRepairDetailsName', 
join in searh()
$query->joinWith(['irSt', 'irTchn', 'invtRepairDetails', ]);*/
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'ir_stID', 'ir_tchnID'], 'integer'],
            [['ir_stID', 'ir_date'], 'required'],
            [['ir_date', 'ir_tchndate'], 'safe'],
            [['ir_stID'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['ir_stID' => 'user_id']],
            [['ir_tchnID'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['ir_tchnID' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ir_id' => 'ID',
            'status' => 'สถานะ',
            'ir_stID' => 'ผู้แจ้ง',
            'ir_code' => 'หมายเลข',
            'ir_tchnID' => 'ผู้ตรวจสอบ',
            'ir_date' => 'วันที่แจ้งซ่อม',
            'ir_tchndate' => 'วันที่รายงานผล',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrSt()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'ir_stID']);
		
			/*
			$dataProvider->sort->attributes['irStName'] = [
				'asc' => ['person.name' => SORT_ASC],
				'desc' => ['person.name' => SORT_DESC],
			];
			
			->andFilterWhere(['like', 'person.name', $this->irStName])
			->orFilterWhere(['like', 'person.name1', $this->irStName])
						in grid
			[
				'attribute' => 'irStName',
				'value' => 'irSt.name',
				'label' => $searchModel->attributeLabels()['ir_stID'],
				'filter' => \Person::irStList,
			],
			*/
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrTchn()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'ir_tchnID']);
		
			/*
			$dataProvider->sort->attributes['irTchnName'] = [
				'asc' => ['person.name' => SORT_ASC],
				'desc' => ['person.name' => SORT_DESC],
			];
			
			->andFilterWhere(['like', 'person.name', $this->irTchnName])
			->orFilterWhere(['like', 'person.name1', $this->irTchnName])
						in grid
			[
				'attribute' => 'irTchnName',
				'value' => 'irTchn.name',
				'label' => $searchModel->attributeLabels()['ir_tchnID'],
				'filter' => \Person::irTchnList,
			],
			*/
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvtRepairDetails()
    {
        return $this->hasMany(InvtRepairDetail::className(), ['ird_irID' => 'ir_id']);
		
			/*
			$dataProvider->sort->attributes['invtRepairDetailsName'] = [
				'asc' => ['invt_repair.name' => SORT_ASC],
				'desc' => ['invt_repair.name' => SORT_DESC],
			];
			
			->andFilterWhere(['like', 'invt_repair.name', $this->invtRepairDetailsName])
			->orFilterWhere(['like', 'invt_repair.name1', $this->invtRepairDetailsName])
						in grid
			[
				'attribute' => 'invtRepairDetailsName',
				'value' => 'invtRepairDetails.name',
				'label' => $searchModel->attributeLabels()['ir_id'],
				'filter' => \InvtRepairDetail::invtRepairDetailsList,
			],
			*/
    }

public function getInvtRepairList(){
		return ArrayHelper::map(self::find()->all(), 'id', 'title');
	}
//    public static function getDetailshort($id){
//        $tmp = InvtRepairDetail::find()->where(['ird_irID' => $id])->asArray()->all();
//        return $tmp;
//        //return ArrayHelper::map(self::find()->all(), 'id', 'title');
//    }
    public function getChoice($id){
//        $customers = InvtRepairDetail::findAll($id);
        //echo $this->ir_id;
//        print_r($customers);
        //exit();
//        return $customers;
        return InvtRepairDetail::find()->where(['ird_irID' => $id])->asArray()->all();
//        return ArrayHelper::getValue($this->getItemChoice(),$this->ird_irID);
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
