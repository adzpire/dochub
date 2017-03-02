<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\helpers\ArrayHelper;
use backend\modules\person\models\Person;
use backend\modules\mainjob\models\MainJob;
/**
 * This is the model class for table "form_auto_pp".
 *
 
 * @property integer $pp_id
 * @property string $pp_actname
 * @property integer $pp_accountnum
 * @property string $pp_bdate
 * @property string $pp_edate
 * @property integer $pp_stid
 * @property integer $pp_jid
 * @property Person $ppSt
 * @property MainJob $ppJ
 */
class FormAutoPp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_auto_pp';
    }

    const MODEL_NAME = 'แบบฟอร์มขอ PSU Passport';
    public $ppStName;
    public $rangedatetime;
    public $ppJName;

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($insert) {

            $ssmdl = new FormAutoSession();
            $ssmdl->fss_fid = $this->pp_id;
            $ssmdl->fss_type = 'formAutoPp';
            //$ssmdl->save();
            if ($ssmdl->save()) {
            } else {
                print_r($ssmdl->getErrors());
                exit;
            }
        } else {
            $ssmdl = FormAutoSession::find()->where(['fss_fid' => $this->pp_id, 'fss_type' => 'formAutoPp'])->one();
            $ssmdl->updated_at = null;
            $ssmdl->updated_by = null;
            $ssmdl->save();
        }
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $model = FormAutoSession::find()->where(['fss_fid' => $this->pp_id, 'fss_type' => 'formAutoPp'])->one();
            $model->delete();
            return true;
        } else {
            return false;
        }
    }
/*add rule in [safe]
'ppStName', 'ppJName', 
join in searh()
$query->joinWith(['ppSt', 'ppJ', ]);*/    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pp_actname', 'pp_accountnum', 'pp_bdate', 'pp_edate', 'pp_stid', 'pp_jid'], 'required'],
            [['pp_accountnum', 'pp_stid', 'pp_jid'], 'integer'],
            [['pp_bdate', 'pp_edate'], 'safe'],
            [['pp_actname'], 'string', 'max' => 255],
            [['pp_stid'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['pp_stid' => 'user_id']],
            [['pp_jid'], 'exist', 'skipOnError' => true, 'targetClass' => MainJob::className(), 'targetAttribute' => ['pp_jid' => 'stc_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pp_id' => 'ID',
            'pp_actname' => 'ชื่อโครงการ',
            'pp_accountnum' => 'จำนวนบัญชี',
            'pp_bdate' => 'วันเริ่ม',
            'pp_edate' => 'วันสิ้นสุด',
            'pp_stid' => 'ผู้ขอ',
            'pp_jid' => 'งาน',
            'rangedatetime' => 'ตั้งแต่วันที่ - ถึงวันที่',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSs()
    {
        return $this->hasOne(FormAutoSession::className(), ['fss_fid' => 'pp_id'])->where(['fss_type' => 'formAutoPp']);
    }

    public function getPpSt()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'pp_stid']);
		
			/*
			$dataProvider->sort->attributes['ppStName'] = [
				'asc' => ['person.name' => SORT_ASC],
				'desc' => ['person.name' => SORT_DESC],
			];
			
			->andFilterWhere(['like', 'person.name', $this->ppStName])
			->orFilterWhere(['like', 'person.name1', $this->ppStName])
						in grid
			[
				'attribute' => 'ppStName',
				'value' => 'ppSt.name',
				'label' => $searchModel->attributeLabels()['pp_stid'],
				'filter' => \Person::ppStList,
			],
			
			in view
			[
				'label' => $model->attributeLabels()['pp_stid'],
				'value' => $model->ppSt->name,
				//'format' => ['date', 'long']
			],
			*/
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpJ()
    {
        return $this->hasOne(MainJob::className(), ['stc_id' => 'pp_jid']);
		
			/*
			$dataProvider->sort->attributes['ppJName'] = [
				'asc' => ['main_job.name' => SORT_ASC],
				'desc' => ['main_job.name' => SORT_DESC],
			];
			
			->andFilterWhere(['like', 'main_job.name', $this->ppJName])
			->orFilterWhere(['like', 'main_job.name1', $this->ppJName])
						in grid
			[
				'attribute' => 'ppJName',
				'value' => 'ppJ.name',
				'label' => $searchModel->attributeLabels()['pp_jid'],
				'filter' => \MainJob::ppJList,
			],
			
			in view
			[
				'label' => $model->attributeLabels()['pp_jid'],
				'value' => $model->ppJ->name,
				//'format' => ['date', 'long']
			],
			*/
    }

public static function getFormAutoPpList(){
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
