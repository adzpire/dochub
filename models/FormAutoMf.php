<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\helpers\ArrayHelper;
use backend\modules\person\models\Person;
/**
 * This is the model class for table "form_auto_mf".
 *
 * @property integer $fid
 * @property string $mf_utelephone
 * @property integer $mf_ucheck
 * @property string $mf_spname
 * @property string $mf_dadname
 * @property string $mf_momname
 * @property string $mf_chname
 * @property string $mf_chbirth
 * @property integer $mf_dadorder
 * @property integer $mf_momorder
 * @property integer $mf_chstatus
 * @property integer $mf_chright
 * @property integer $mf_repchorder
 * @property string $mf_repchname
 * @property string $mf_repchbirth
 * @property string $mf_repchdeath
 * @property string $mf_ill
 * @property string $mf_hospital
 * @property integer $mf_hospitaltype
 * @property string $mf_hosbdate
 * @property string $mf_hosedate
 * @property integer $mf_feeright
 * @property integer $mf_lackfor
 * @property integer $mf_lackright
 * @property integer $mf_lackamount
 * @property integer $mf_fiftyfor
 * @property integer $mf_fiftyamount
 * @property string $mf_year
 * @property integer $mf_usedto
 * @property integer $mf_want
 * @property string $mf_date
 * @property integer $mf_stid
 *
 * @property Person $mfSt
 */
class FormAutoMf extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_auto_mf';
    }
    public static function fn()
    {
        return [
            'code' => 'medicfee',
            'name' => Yii::t('app', 'ใบเบิกเงินสวัสดิการเกี่ยวกับการรักษาพยาบาลพนักงานมหาวิทยาลัยฯ'),
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
            [['mf_utelephone', 'mf_ill', 'mf_hospital', 'mf_hospitaltype', 'mf_hosbdate', 'mf_hosedate', 'mf_feeright', 'mf_year', 'mf_usedto', 'mf_want', 'mf_date', 'mf_stid'], 'required'],
            [['mf_ucheck', 'mf_dadorder', 'mf_momorder', 'mf_chstatus', 'mf_chright', 'mf_repchorder', 'mf_hospitaltype', 'mf_feeright', 'mf_lackfor', 'mf_lackright', 'mf_lackamount', 'mf_fiftyfor', 'mf_fiftyamount', 'mf_usedto', 'mf_want', 'mf_stid'], 'integer'],
            [['mf_chbirth', 'mf_repchbirth', 'mf_repchdeath', 'mf_hosbdate', 'mf_hosedate', 'mf_date'], 'safe'],
            [['mf_ill'], 'string'],
            [['mf_utelephone', 'mf_spname', 'mf_dadname', 'mf_momname', 'mf_chname', 'mf_repchname', 'mf_hospital', 'mf_year'], 'string', 'max' => 255],
            [['mf_stid'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['mf_stid' => 'user_id']],
            [
                ['mf_lackfor', 'mf_lackright', 'mf_lackamount', 'mf_fiftyfor', 'mf_fiftyamount'], 'required',
                'when' => function ($model) {
                    return $model->mf_feeright == '0';
                },
                'whenClient' => "function (attribute, value) { return $('#cureright').val() == '0'; }",
            ],
            [
                ['mf_lackfor', 'mf_lackright', 'mf_lackamount'], 'required',
                'when' => function ($model) {
                    return $model->mf_feeright == '1';
                },
                'whenClient' => "function (attribute, value) { return $('#cureright').val() == '1'; }",
            ],
            [
                ['mf_fiftyfor', 'mf_fiftyamount'], 'required',
                'when' => function ($model) {
                    return $model->mf_feeright == '2';
                },
                'whenClient' => "function (attribute, value) { return $('#cureright').val() == '2'; }",
            ],
            [['mf_hosbdate', 'mf_hosedate'],'validateDates', 'enableClientValidation' => true],
//            ['mf_hosbdate', 'date', 'timestampAttribute' => 'mf_hosbdate'],
//            ['mf_hosedate', 'date', 'timestampAttribute' => 'mf_hosedate'],
//            ['mf_hosbdate', 'compare', 'compareAttribute' => 'mf_hosedate', 'operator' => '<'],
        ];
    }
    public function validateDates(){
        if(strtotime($this->mf_hosedate) < strtotime($this->mf_hosbdate)){
            $this->addError('mf_hosbdate','กรอกวันเข้า/ออกไม่ถูกต้อง');
            $this->addError('mf_hosedate','กรอกวันเข้า/ออกไม่ถูกต้อง');
        }
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fid' => 'ID',
            'mf_utelephone' => 'หมายเลขโทรศัพท์มือถือ',
            'mf_ucheck' => 'ขอเบิก-ผู้ขอ',
            'mf_spname' => 'ขอเบิก-ชื่อคู่สมรส',
            'mf_dadname' => 'ขอเบิก-ชื่อพ่อ',
            'mf_momname' => 'ขอเบิก-ชื่อแม่',
            'mf_chname' => 'ขอเบิก-ชื่อลูก',
            'mf_chbirth' => 'วันเกิดลูก',
            'mf_dadorder' => 'ลูกลำดับที่ของพ่อ',
            'mf_momorder' => 'ลูกลำดับที่ของแม่',
            'mf_chstatus' => '1-ยังไม่บรรลุนิติภาวะ 2-เป็นบุตรไร้ความสามารถหรือเสมือนไร้ความสามารถ',
            'mf_chright' => '1-บุตรอยู่ในความปกครองของข้าพเจ้าโดยการหย่า หรือมิได้สมรสกันตามกฏหมาย หรือสามีถึงแก่กรรมแล้ว  2-บุตรอยู่ในความอุปการะเลี้ยงดูของข้าพเจ้า เนื่องจากแยกกันอยู่โดยมิได้หย่าตามกฏหมาย',
            'mf_repchorder' => 'ลำดับบุตรแทนที่',
            'mf_repchname' => 'ชื่อบุตรแทนที่',
            'mf_repchbirth' => 'วันเกิดบุตรแทนที่',
            'mf_repchdeath' => 'วันตายบุตรแทนที่',
            'mf_ill' => 'โรค',
            'mf_hospital' => 'โรงพยาบาล',
            'mf_hospitaltype' => '0-ทั้งคู่ 1-ทางราชการ 2-เอกชน',
            'mf_hosbdate' => 'วันเข้าโรงพยาบาล',
            'mf_hosedate' => 'วันออกโรงพยาบาล',
            'mf_feeright' => 'สิทธิการเบิก',
            'mf_lackfor' => '0-ทั้งคู่1-ข้าพเจ้า 2-ญาติสายตรง (บิดา มารดา คู่สมรส บุตร)',
            'mf_lackright' => '1-ประกันสังคม 2-ประกันสุขภาพถ้วนหน้า',
            'mf_lackamount' => 'จำนวนเงินส่วนที่ขาด',
            'mf_fiftyfor' => '0-ทั้งคู่1-ข้าพเจ้า 2-ญาติสายตรง (บิดา มารดา คู่สมรส บุตร)',
            'mf_fiftyamount' => 'จำนวนเงินหา้สิบเปอร์เซน',
            'mf_year' => 'ปีงบประมาณ',
            'mf_usedto' => '1-ยังไม่เคยใช้สิทธิเบิกค่ารักษาพยาบาล 2-เคยใช้สิทธิเบิกค่ารักษาพยาบาลมาแล้ว',
            'mf_want' => 'จำนวนที่ต้องการ',
            'mf_date' => 'วันที่',
            'mf_stid' => 'staffID',
            'rangedatetime' => 'ตั้งแต่วันที่ - ถึงวันที่',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMfSt()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'mf_stid']);
    }

    public static function itemsAlias($key){

        $items = [
            'childstat'=>[
                "0" => "-",
                "1" => "ยังไม่บรรลุนิติภาวะ",
                "2" => "เป็นบุตรไร้ความสามารถหรือเสมือนไร้ความสามารถ",
            ],
            'birthright'=>[
                "0" => "-",
                "1" => "บุตรอยู่ในความปกครองของข้าพเจ้าโดยการหย่า หรือมิได้สมรสกันตามกฏหมาย หรือสามีถึงแก่กรรมแล้ว",
                "2" => "บุตรอยู่ในความอุปการะเลี้ยงดูของข้าพเจ้า เนื่องจากแยกกันอยู่โดยมิได้หย่าตามกฏหมาย",
            ],
            'hosptype'=>[
                "1" => "ราชการ",
                "2" => "เอกชน",
                "0" => "ทั้งราชการและเอกชน",
            ],
            'feeright'=>[
                "1" => "เฉพาะส่วนที่ยังขาด (ส่วนต่างที่เบิกจากประกันตนหรือประกันสุขภาพถ้วนหน้าไม่ได้)",
                "2" => "สิทธิ 50% (ไม่ใช้สิทธิประกันตนหรือสิทธิประกันสุขภาพถ้วนหน้า)",
                "0" => "ทั้งสองสิทธิ",
            ],
            'lackright'=>[
                "0" => "ประกันสังคม",
                "1" => "ประกันสุขภาพถ้วนหน้า",
            ],
            'lackfor'=>[
                "1" => "ข้าพเจ้า",
                "2" => "ญาติสายตรง (บิดา มารดา คู่สมรส บุตร)",
                "0" => "ทั้งคู่",
            ],
            'fiftyfor'=>[
                "1" => "ข้าพเจ้า",
                "2" => "ญาติสายตรง (บิดา มารดา คู่สมรส บุตร)",
                "0" => "ทั้งคู่",
            ],
            'usedto'=>[
                "1" => "ยังไม่เคยใช้สิทธิเบิกค่ารักษาพยาบาล",
                "2" => "เคยใช้สิทธิเบิกค่ารักษาพยาบาลมาแล้ว",
            ],
        ];
        return ArrayHelper::getValue($items,$key,[]);
        //return array_key_exists($key, $items) ? $items[$key] : [];
    }
    public function getItemChildstat()
    {
        return self::itemsAlias('childstat');
    }

    public function getItemBirthright()
    {
        return self::itemsAlias('birthright');
    }

    public function getItemHosptype()
    {
        return self::itemsAlias('hosptype');
    }
    public static function getItemFeeright()
    {
        return self::itemsAlias('feeright');
    }
    public function getItemLackright()
    {
        return self::itemsAlias('lackright');
    }
    public function getItemLackfor()
    {
        return self::itemsAlias('lackfor');
    }
    public function getItemFiftyfor()
    {
        return self::itemsAlias('fiftyfor');
    }
    public function getItemUsedto()
    {
        return self::itemsAlias('usedto');
    }
    //-----
    public function getBirthright(){
        return ArrayHelper::getValue($this->getItemChildstat(),$this->mf_chstatus);
    }
    public function getChildstat(){
        return ArrayHelper::getValue($this->getItemBirthright(),$this->mf_chright);
    }
    public function getHosptype(){
        return ArrayHelper::getValue($this->getItemHosptype(),$this->mf_hospitaltype);
    }
    public function getFeeright(){
        return ArrayHelper::getValue($this->getItemFeeright(),$this->mf_feeright);
    }
    public function getLackright(){
        return ArrayHelper::getValue($this->getItemLackright(),$this->mf_lackright);
    }
    public function getLackfor(){
        return ArrayHelper::getValue($this->getItemLackfor(),$this->mf_lackfor);
    }
    public function getFiftyfor(){
        return ArrayHelper::getValue($this->getItemfiftyfor(),$this->mf_fiftyfor);
    }
    public function getUsedto(){
        return ArrayHelper::getValue($this->getItemUsedto(),$this->mf_usedto);
    }
}
