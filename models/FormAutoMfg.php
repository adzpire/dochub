<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\helpers\ArrayHelper;
use backend\modules\person\models\Person;
/**
 * This is the model class for table "form_auto_mfg".
 *
 * @property integer $fid
 * @property integer $mfg_ucheck
 * @property string $mfg_spname
 * @property string $mfg_spid
 * @property string $mfg_dadname
 * @property string $mfg_dadid
 * @property string $mfg_momname
 * @property string $mfg_momid
 * @property string $mfg_chname
 * @property string $mfg_chid
 * @property string $mfg_chbirth
 * @property integer $mfg_chorder
 * @property integer $mfg_chstatus
 * @property string $mfg_ill
 * @property string $mfg_hospital
 * @property integer $mfg_hospitaltype
 * @property string $mfg_hosbdate
 * @property string $mfg_hosedate
 * @property integer $mfg_hosfee
 * @property integer $mfg_recnum
 * @property integer $mfg_feeright
 * @property integer $mfg_amount
 * @property string $mfg_info
 * @property integer $mfg_uright
 * @property integer $mfg_relright
 * @property string $mfg_date
 * @property integer $mfg_stid
 *
 * @property Person $mfgSt
 */
class FormAutoMfg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_auto_mfg';
    }
    public static function fn()
    {
        return [
            'code' => 'medicfeegov',
            'name' => Yii::t('app', 'ใบเบิกเงินสวัสดิการเกี่ยวกับการรักษาพยาบาลข้าราชการ'),
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
    public $rangedatetime;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mfg_ucheck', 'mfg_chorder', 'mfg_chstatus', 'mfg_hospitaltype', 'mfg_hosfee', 'mfg_recnum', 'mfg_feeright', 'mfg_amount', 'mfg_uright', 'mfg_relright', 'mfg_stid'], 'integer'],
            [['mfg_chbirth', 'mfg_hosbdate', 'mfg_hosedate', 'mfg_date'], 'safe'],
            [['mfg_ill', 'mfg_hospital', 'mfg_hospitaltype', 'mfg_hosbdate', 'mfg_hosedate', 'mfg_hosfee', 'mfg_recnum', 'mfg_feeright', 'mfg_amount', 'mfg_uright', 'mfg_relright', 'mfg_date', 'mfg_stid'], 'required'],
            [['mfg_ill', 'mfg_info'], 'string'],
            [['mfg_spname', 'mfg_dadname', 'mfg_momname', 'mfg_chname', 'mfg_hospital'], 'string', 'max' => 255],
//            [['mfg_spid', 'mfg_dadid', 'mfg_momid', 'mfg_chid'], 'string', 'max' => 13],
//            [['mfg_spid', 'mfg_dadid', 'mfg_momid', 'mfg_chid'], 'validateIdCard'],
            [['mfg_stid'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['mfg_stid' => 'user_id']],
            [['mfg_spid', 'mfg_dadid', 'mfg_momid', 'mfg_chid'], function ($attribute, $params, $validator) {
                if (!$this->validateIdCard($this->$attribute)) {
                    $this->addError($attribute, 'หมายเลขบัตรประชาชน '.$attribute.' ไม่ถูกต้อง.');
                }
            }],
            [['mfg_hosbdate', 'mfg_hosedate'],'validateDates', 'enableClientValidation' => true],
        ];
    }

    public function validateIdCard($idcard)
    {
        $id = str_split(str_replace('-','', $idcard)); //ตัดรูปแบบและเอา ตัวอักษร ไปแยกเป็น array $id
        $sum = 0;
        $total = 0;
        $digi = 13;

        for($i=0; $i<12; $i++){
            $sum = $sum + (intval($id[$i]) * $digi);
            $digi--;
        }
        $total = (11 - ($sum % 11)) % 10;

        if($total != $id[12]){ //ตัวที่ 13 มีค่าไม่เท่ากับผลรวมจากการคำนวณ ให้ add error
//            $this->addError('mfg_spid', 'หมายเลขบัตรประชาชนไม่ถูกต้อง');
            return false;
        }else{
            return true;
        }
    }

    public function validateDates(){
        if(strtotime($this->mfg_hosedate) < strtotime($this->mfg_hosbdate)){
            $this->addError('mfg_hosbdate','กรอกวันเข้า/ออกไม่ถูกต้อง');
            $this->addError('mfg_hosedate','กรอกวันเข้า/ออกไม่ถูกต้อง');
        }
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fid' => 'ID',
            'mfg_ucheck' => 'ขอเบิก-ผู้ขอ',
            'mfg_spname' => 'ขอเบิก-ชื่อคู่สมรส',
            'mfg_spid' => 'ขอเบิก-ไอดีคู่สมรส',
            'mfg_dadname' => 'ขอเบิก-ชื่อบิดา',
            'mfg_dadid' => 'ขอเบิก-ไอดีบิดา',
            'mfg_momname' => 'ขอเบิก-ชื่อมารดา',
            'mfg_momid' => 'ขอเบิก-ไอดีมารดา',
            'mfg_chname' => 'ขอเบิก-ชื่อบุตร',
            'mfg_chid' => 'ไอดีบุตร',
            'mfg_chbirth' => 'วันเกิดบุตร',
            'mfg_chorder' => 'ลำดับที่บุตร',
            'mfg_chstatus' => '1-ยังไม่บรรลุนิติภาวะ 2-เป็นบุตรไร้ความสามารถหรือเสมือนไร้ความสามารถ',
            'mfg_ill' => 'โรค',
            'mfg_hospital' => 'โรงพยาบาล',
            'mfg_hospitaltype' => '0-ทั้งคู่ 1-ทางราชการ 2-เอกชน',
            'mfg_hosbdate' => 'วันเข้าโรงพยาบาล',
            'mfg_hosedate' => 'วันออกโรงพยาบาล',
            'mfg_hosfee' => 'จำนวนเงินจ่าย',
            'mfg_recnum' => 'จำนวนใบเสร็จ',
            'mfg_feeright' => 'ประเภทสิทธิ์',
            'mfg_amount' => 'จำนวนเงินเบิก',
            'mfg_info' => 'คำชี้แจง',
            'mfg_uright' => 'สิทธิ์ของข้าพเจ้า',
            'mfg_relright' => 'สิทธิ์ของญาติ',
            'mfg_date' => 'วันที่',
            'mfg_stid' => 'staffID',
            'rangedatetime' => 'ตั้งแต่วันที่ - ถึงวันที่',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMfgSt()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'mfg_stid']);
    }

    public static function itemsAlias($key){

        $items = [
            'childstat'=>[
                "0" => "-",
                "1" => "ยังไม่บรรลุนิติภาวะ",
                "2" => "เป็นบุตรไร้ความสามารถหรือเสมือนไร้ความสามารถ",
            ],
            'hosptype'=>[
                "1" => "ราชการ",
                "2" => "เอกชน",
                "0" => "ทั้งราชการและเอกชน",
            ],
            'feeright'=>[
                "0" => "ตามสิทธิ",
                "1" => "เฉพาะส่วนที่ขาดอยู่จากสิทธิที่ได้รับจากหน่วยงานอื่น",
                "2" => "เฉพาะส่วนที่ขาดอยู่จากสัญญาประกันภัย",
            ],
            'uright'=>[
                "0" => "ไม่มีสิทธิได้รับค่ารักษาพยาบาลจากหน่วยงานอื่น",
                "1" => "มีสิทธิได้รับค่ารักษาพยาบาลจากหน่วยงานอื่นแต่เลือกใช้สิทธิจากทางราชการ",
                "2" => "มีสิทธิได้รับค่ารักษาพยาบาลตามสัญญาประกันภัย",
                "3" => "เป็นผู้ใช้สิทธิเบิกค่ารักษาพยาบาลสำหรับบุตรแต่เพียงผู้เดียว",
            ],
            'relright'=>[
                "0" => "ไม่มีสิทธิได้รับค่ารักษาพยาบาลจากหน่วยงานอื่น",
                "1" => "มีสิทธิได้รับค่ารักษาพยาบาลจากหน่วยงานอื่นแต่ค่ารักษาพยาบาลที่ได้รับต่ำกว่าสิทธิตามพระราชกฤษฏีกาฯ",
                "2" => "มีสิทธิได้รับค่ารักษาพยาบาลตามสัญญาประกันภัย",
                "3" => "มีสิทธิได้รับค่ารักษาพยาบาลจากหน่วยงานอื่นในฐานะเป็นผู้อาศัยสิทธิของผู้อื่น",
            ],
        ];
        return ArrayHelper::getValue($items,$key,[]);
    }
    public function getItemChildstat()
    {
        return self::itemsAlias('childstat');
    }
    public function getItemHosptype()
    {
        return self::itemsAlias('hosptype');
    }
    public function getItemFeeright()
    {
        return self::itemsAlias('feeright');
    }
    public function getItemUright()
    {
        return self::itemsAlias('uright');
    }
    public function getItemRelright()
    {
        return self::itemsAlias('relright');
    }
    //-----
    public function getChildstat(){
        return ArrayHelper::getValue($this->getItemChildstat(),$this->mfg_chstatus);
    }
    public function getHosptype(){
        return ArrayHelper::getValue($this->getItemHosptype(),$this->mfg_hospitaltype);
    }
    public function getFeeright(){
        return ArrayHelper::getValue($this->getItemFeeright(),$this->mfg_feeright);
    }
    public function getUright(){
        return ArrayHelper::getValue($this->getItemUright(),$this->mfg_uright);
    }
    public function getRelright(){
        return ArrayHelper::getValue($this->getItemRelright(),$this->mfg_relright);
    }
}
