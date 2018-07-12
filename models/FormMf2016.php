<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\helpers\ArrayHelper;
use backend\modules\person\models\Person;
/**
 * This is the model class for table "form_mf2016".
 *

 * @property integer $fid
 * @property integer $mf_stid
 * @property string $mf_ill
 * @property string $mf_hospital
 * @property integer $mf_want
 * @property integer $mf_choice
 * @property string $mf_date
 * @property Person $mfSt
 */
class FormMf2016 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_mf2016';
    }

    public static function fn()
    {
        return [
            'code' => 'mf',
            'name' => Yii::t('app', 'ใบเบิกเงินสวัสดิการเกี่ยวกับการรักษาพยาบาลพนักงานมหาวิทยาลัย'),
            'icon' => 'bed',
        ];
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

    public $mfStName;
    public $choice = [ 1 => 'ค่ารักษาพยาบาล ค่าคลอดบุตรและทันตกรรม(ตนเอง)', 2 => 'ค่ารักษาพยาบาล ค่าคลอดบุตรและทันตกรรม(ญาติสายตรง เช่น บิดา มารดา คู่สมรส หรือบุตร ของข้าพเจ้า)', 3 => 'ค่ารักษาพยาบาลกรณีเป็นผู้ป่วยนอก และ การตรวจสุขภาพประจำปี (ตนเอง)', 4 => 'เบิกจ่ายส่วนที่เกินโดยจ่ายร่วมมหาวิทยาลัย(Co-pay) เฉพาะค่าวัสดุอุปกรณ์ทางการแพทย์ และอวัยวะเทียม', 5 => 'ทุพพลภาพจากอุบัติเหตุหรือเจ็บป่วยไม่สามารถปฏิบัติงานได้'];
    /*add rule in [safe]
    'mfStName',
    join in searh()
    $query->joinWith(['mfSt', ]);*/
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mf_stid', 'mf_ill', 'mf_hospital', 'mf_want', 'mf_choice', 'mf_date'], 'required'],
            [['mf_stid', 'mf_want', 'mf_choice'], 'integer'],
            [['mf_ill'], 'string'],
            [['mf_date'], 'safe'],
            [['mf_hospital'], 'string', 'max' => 255],
            [['mf_stid'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['mf_stid' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fid' => 'ID',
            'mf_stid' => 'staffID',
            'mf_ill' => 'โรค',
            'mf_hospital' => 'โรงพยาบาล',
            'mf_want' => 'จำนวนที่ต้องการ',
            'mf_choice' => 'ตัวเลือก',
            'mf_date' => 'วันที่ขอ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMfSt()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'mf_stid']);

        /*
        $dataProvider->sort->attributes['mfStName'] = [
            'asc' => ['person.name' => SORT_ASC],
            'desc' => ['person.name' => SORT_DESC],
        ];

        ->andFilterWhere(['like', 'person.name', $this->mfStName])
        ->orFilterWhere(['like', 'person.name1', $this->mfStName])

        in grid
        [
            'attribute' => 'mfStName',
            'value' => 'mfSt.name',
            'label' => $searchModel->attributeLabels()['mf_stid'],
            'filter' => \Person::mfStList,
        ],
        */
    }

    public function getMfStList()
    {
        $data = $this->mfSt;
        $doc = '<ul>';
        foreach($data as $key) {
            $doc .= '<li>'.$key->mf_stid.'</li>';
        }
        $doc .= '</ul>';
        return $doc;
    }

    public function getFormMf2016List(){
        return ArrayHelper::map(self::find()->all(), 'fid', 'title');
    }

    /*
        public static function itemsAlias($key) {
                $items = [
                    'choice' => [
                        1 => Yii::t('app', 'ร่าง'),
                        2 => Yii::t('app', 'เสนอ'),
                        3 => Yii::t('app', 'อนุมัติ'),
                        4 => Yii::t('app', 'ไม่อนุมัติ'),
                        5 => Yii::t('app', 'คืนแล้ว'),
                        6 => Yii::t('app', 'คืนแล้ว'),
                    ],
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
