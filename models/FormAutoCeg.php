<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\helpers\ArrayHelper;
use backend\modules\person\models\Person;
use backend\modules\thailocale\models\LocaleAmphur;
use backend\modules\thailocale\models\LocaleProvince;
/**
 * This is the model class for table "form_auto_ceg".
 *
 * @property integer $fid
 * @property string $ceg_spname
 * @property integer $ceg_spjobtype
 * @property string $ceg_spposition
 * @property string $ceg_spbelong
 * @property integer $ceg_right
 * @property integer $ceg_feetype
 * @property string $ceg_ch1name
 * @property string $ceg_ch1birth
 * @property integer $ceg_ch1dadorder
 * @property integer $ceg_ch1momorder
 * @property integer $ceg_ch1reporder
 * @property string $ceg_ch1repname
 * @property string $ceg_ch1repbirth
 * @property string $ceg_ch1repdeath
 * @property string $ceg_ch1schl
 * @property integer $ceg_ch1schlamphur
 * @property integer $ceg_ch1schlprovince
 * @property string $ceg_ch1schlclass
 * @property integer $ceg_ch1fee1
 * @property integer $ceg_ch1fee2
 * @property string $ceg_ch2name
 * @property string $ceg_ch2birth
 * @property integer $ceg_ch2dadorder
 * @property integer $ceg_ch2momorder
 * @property integer $ceg_ch2reporder
 * @property string $ceg_ch2repname
 * @property string $ceg_ch2repbirth
 * @property string $ceg_ch2repdeath
 * @property string $ceg_ch2schl
 * @property integer $ceg_ch2schlamphur
 * @property integer $ceg_ch2schlprovince
 * @property string $ceg_ch2schlclass
 * @property integer $ceg_ch2fee1
 * @property integer $ceg_ch2fee2
 * @property string $ceg_ch3name
 * @property string $ceg_ch3birth
 * @property integer $ceg_ch3dadorder
 * @property integer $ceg_ch3momorder
 * @property integer $ceg_ch3reporder
 * @property string $ceg_ch3repname
 * @property string $ceg_ch3repbirth
 * @property string $ceg_ch3repdeath
 * @property string $ceg_ch3schl
 * @property integer $ceg_ch3schlamphur
 * @property integer $ceg_ch3schlprovince
 * @property string $ceg_ch3schlclass
 * @property integer $ceg_ch3fee1
 * @property integer $ceg_ch3fee2
 * @property integer $ceg_feeright
 * @property integer $ceg_money
 * @property string $ceg_info
 * @property integer $ceg_agree
 * @property integer $ceg_agreemoney
 * @property string $ceg_date
 * @property integer $ceg_stid
 *
 * @property Person $cegSt
 * @property LocaleAmphur $cegCh1schlamphur
 * @property LocaleProvince $cegCh1schlprovince
 * @property LocaleAmphur $cegCh2schlamphur
 * @property LocaleProvince $cegCh2schlprovince
 * @property LocaleAmphur $cegCh3schlamphur
 * @property LocaleProvince $cegCh3schlprovince
 */
class FormAutoCeg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_auto_ceg';
    }
    public static function fn()
    {
        return [
            'code' => 'childedugov',
            'name' => Yii::t('app', 'ใบเบิกเงินสวัสดิการเกี่ยวกับการศึกษาของบุตรข้าราชการ'),
            'icon' => 'education',
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
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ceg_spname', 'ceg_spjobtype', 'ceg_right', 'ceg_feetype', 'ceg_ch1name', 'ceg_ch1birth', 'ceg_ch1schl', 'ceg_ch1schlamphur', 'ceg_ch1schlprovince', 'ceg_ch1schlclass', 'ceg_feeright', 'ceg_agree', 'ceg_date', 'ceg_stid'], 'required'],
            [['ceg_right', 'ceg_feetype', 'ceg_ch1dadorder', 'ceg_ch1momorder', 'ceg_ch1reporder', 'ceg_ch1schlamphur', 'ceg_ch1schlprovince', 'ceg_ch1fee1', 'ceg_ch1fee2', 'ceg_ch2dadorder', 'ceg_ch2momorder', 'ceg_ch2reporder', 'ceg_ch2schlamphur', 'ceg_ch2schlprovince', 'ceg_ch2fee1', 'ceg_ch2fee2', 'ceg_ch3dadorder', 'ceg_ch3momorder', 'ceg_ch3reporder', 'ceg_ch3schlamphur', 'ceg_ch3schlprovince', 'ceg_ch3fee1', 'ceg_ch3fee2', 'ceg_feeright', 'ceg_money', 'ceg_agree', 'ceg_agreemoney', 'ceg_stid'], 'integer'],
            [['ceg_ch1birth', 'ceg_ch1repbirth', 'ceg_ch1repdeath', 'ceg_ch2birth', 'ceg_ch2repbirth', 'ceg_ch2repdeath', 'ceg_ch3birth', 'ceg_ch3repbirth', 'ceg_ch3repdeath', 'ceg_date'], 'safe'],
            [['ceg_info'], 'string'],
            [['ceg_spname', 'ceg_spposition', 'ceg_spbelong', 'ceg_ch1name', 'ceg_ch1repname', 'ceg_ch1schl', 'ceg_ch1schlclass', 'ceg_ch2name', 'ceg_ch2repname', 'ceg_ch2schl', 'ceg_ch2schlclass', 'ceg_ch3name', 'ceg_ch3repname', 'ceg_ch3schl', 'ceg_ch3schlclass'], 'string', 'max' => 255],
            [['ceg_stid'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['ceg_stid' => 'user_id']],
            [['ceg_ch1schlamphur'], 'exist', 'skipOnError' => true, 'targetClass' => LocaleAmphur::className(), 'targetAttribute' => ['ceg_ch1schlamphur' => 'AMPHUR_ID']],
            [['ceg_ch1schlprovince'], 'exist', 'skipOnError' => true, 'targetClass' => LocaleProvince::className(), 'targetAttribute' => ['ceg_ch1schlprovince' => 'PROVINCE_ID']],
            [['ceg_ch2schlamphur'], 'exist', 'skipOnError' => true, 'targetClass' => LocaleAmphur::className(), 'targetAttribute' => ['ceg_ch2schlamphur' => 'AMPHUR_ID']],
            [['ceg_ch2schlprovince'], 'exist', 'skipOnError' => true, 'targetClass' => LocaleProvince::className(), 'targetAttribute' => ['ceg_ch2schlprovince' => 'PROVINCE_ID']],
            [['ceg_ch3schlamphur'], 'exist', 'skipOnError' => true, 'targetClass' => LocaleAmphur::className(), 'targetAttribute' => ['ceg_ch3schlamphur' => 'AMPHUR_ID']],
            [['ceg_ch3schlprovince'], 'exist', 'skipOnError' => true, 'targetClass' => LocaleProvince::className(), 'targetAttribute' => ['ceg_ch3schlprovince' => 'PROVINCE_ID']],
            [
                ['ceg_spposition', 'ceg_spbelong'], 'required', 'when' => function ($model) {
                return $model->ceg_spjobtype == '2';
            },
                'whenClient' => "function (attribute, value) { return $('#spjtype').val() == '2'; }",
            ],
            [
                ['ceg_spposition', 'ceg_spbelong'], 'required', 'when' => function ($model) {
                return $model->ceg_spjobtype == '3';
            },
                'whenClient' => "function (attribute, value) { return $('#spjtype').val() == '3'; }",
            ],
            [
                ['ceg_spposition', 'ceg_spbelong'], 'required', 'when' => function ($model) {
                return $model->ceg_spjobtype == '4';
            },
                'whenClient' => "function (attribute, value) { return $('#spjtype').val() == '4'; }",
            ],
            [
                ['ceg_agreemoney'], 'required', 'when' => function ($model) {
                return $model->ceg_agree == '3';
            },
                'whenClient' => "function (attribute, value) { return $('#agreetype').val() == '3'; }",
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fid' => 'ID',
            'ceg_spname' => 'คู่สมรส-ชื่อ',
            'ceg_spjobtype' => 'คู่สมรส-งาน',
            'ceg_spposition' => 'คู่สมรส-ตำแหน่ง',
            'ceg_spbelong' => 'คู่สมรส-สังกัด',
            'ceg_right' => '1-เป็นบิดาชอบด้วยกฏหมาย  2-เป็นมารดา',
            'ceg_feetype' => '1-เงินบำรุงการศึกษา 2-เงินค่าเล่าเรียน',
            'ceg_ch1name' => 'บุตร1-ชื่อ',
            'ceg_ch1birth' => 'บุตร1-วันเกิด',
            'ceg_ch1dadorder' => 'บุตร1-ลูกคนที่ของพ่อ',
            'ceg_ch1momorder' => 'บุตร1-ลูกคนที่ของแม่',
            'ceg_ch1reporder' => 'บุตร1-ลำดับบุตรแทนที่',
            'ceg_ch1repname' => 'บุตร1-ชื่อบุตรแทนที่',
            'ceg_ch1repbirth' => 'บุตร1-วันเกิดบุตรแทนที่',
            'ceg_ch1repdeath' => 'บุตร1-วันตายบุตรแทนที่',
            'ceg_ch1schl' => 'บุตร1-โรงเรียน',
            'ceg_ch1schlamphur' => 'บุตร1-อำเภอโรงเรียน',
            'ceg_ch1schlprovince' => 'บุตร1-จังหวัดโรงเรียน',
            'ceg_ch1schlclass' => 'บุตร1-ชั้นเรียน',
            'ceg_ch1fee1' => 'บุตร1-จำนวนเงิน1',
            'ceg_ch1fee2' => 'บุตร1-จำนวนเงิน2',
            'ceg_ch2name' => 'บุตร2-ชื่อ',
            'ceg_ch2birth' => 'บุตร2-วันเกิด',
            'ceg_ch2dadorder' => 'บุตร2-ลูกคนที่ของพ่อ',
            'ceg_ch2momorder' => 'บุตร2-ลูกคนที่ของแม่',
            'ceg_ch2reporder' => 'บุตร2-ลำดับบุตรแทนที่',
            'ceg_ch2repname' => 'บุตร2-ชื่อบุตรแทนที่',
            'ceg_ch2repbirth' => 'บุตร2-วันเกิดบุตรแทนที่',
            'ceg_ch2repdeath' => 'บุตร2-วันตายบุตรแทนที่',
            'ceg_ch2schl' => 'บุตร2-โรงเรียน',
            'ceg_ch2schlamphur' => 'บุตร2-อำเภอโรงเรียน',
            'ceg_ch2schlprovince' => 'บุตร2-จังหวัดโรงเรียน',
            'ceg_ch2schlclass' => 'บุตร2-ชั้นเรียน',
            'ceg_ch2fee1' => 'บุตร2-จำนวนเงิน1',
            'ceg_ch2fee2' => 'บุตร2-จำนวนเงิน2',
            'ceg_ch3name' => 'บุตร3-ชื่อ',
            'ceg_ch3birth' => 'บุตร3-วันเกิด',
            'ceg_ch3dadorder' => 'บุตร3-ลูกคนที่ของพ่อ',
            'ceg_ch3momorder' => 'บุตร3-ลุกคนที่ของแม่',
            'ceg_ch3reporder' => 'บุตร3-ลำดับบุตรแทนที่',
            'ceg_ch3repname' => 'บุตร3-ชื่อบุตรแทนที่',
            'ceg_ch3repbirth' => 'บุตร3-วันเกิดบุตรแทนที่',
            'ceg_ch3repdeath' => 'บุตร3-วันตายบุตรแทนที่',
            'ceg_ch3schl' => 'บุตร3-โรงเรียน',
            'ceg_ch3schlamphur' => 'บุตร3-อำเภอโรงเรียน',
            'ceg_ch3schlprovince' => 'บุตร3-จังหวัดโรงเรียน',
            'ceg_ch3schlclass' => 'บุตร3-ชั้นเรียน',
            'ceg_ch3fee1' => 'บุตร3-จำนวนเงิน1',
            'ceg_ch3fee2' => 'บุตร3-จำนวนเงิน2',
            'ceg_feeright' => '1-ตามสิทธิ 2-เฉพาะส่วนที่ยังขาดจากสิทธิ',
            'ceg_money' => 'เงิน',
            'ceg_info' => 'คำชี้แจง',
            'ceg_agree' => 'สิทธิการช่วยเหลือ',
            'ceg_agreemoney' => 'เงินคู่สมรสได้รับ',
            'ceg_date' => 'วันที่',
            'ceg_stid' => 'staffID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCegSt()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'ceg_stid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCegCh1schlamphur()
    {
        return $this->hasOne(LocaleAmphur::className(), ['AMPHUR_ID' => 'ceg_ch1schlamphur']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCegCh1schlprovince()
    {
        return $this->hasOne(LocaleProvince::className(), ['PROVINCE_ID' => 'ceg_ch1schlprovince']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCegCh2schlamphur()
    {
        return $this->hasOne(LocaleAmphur::className(), ['AMPHUR_ID' => 'ceg_ch2schlamphur']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCegCh2schlprovince()
    {
        return $this->hasOne(LocaleProvince::className(), ['PROVINCE_ID' => 'ceg_ch2schlprovince']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCegCh3schlamphur()
    {
        return $this->hasOne(LocaleAmphur::className(), ['AMPHUR_ID' => 'ceg_ch3schlamphur']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCegCh3schlprovince()
    {
        return $this->hasOne(LocaleProvince::className(), ['PROVINCE_ID' => 'ceg_ch3schlprovince']);
    }

    public static function itemsAlias($key){

        $items = [
            'spwork'=>[
                "1" => "ไม่เป็นข้าราชการประจำหรือลูกจ้างประจำ",
                "2" => "เป็นข้าราชการ",
                "3" => "ลูกจ้างประจำ",
                "4" => "เป็นพนักงานหรือลูกจ้างในรัฐวิสาหกิจ / หน่วยงานของทางราชการ ราชการส่วนท้องถิ่น กรุงเทพมหานคร องค์กรอิสระ องค์การมหาชน หรือหน่วยงานอื่นใด",
            ],
            'birthright'=>[
                "1" => "เป็นบิดาชอบด้วยกฏหมาย",
                "2" => "เป็นมารดา",
            ],
            'chfee'=>[
                "1" => "[1] เงินบำรุงการศึกษา",
                "2" => "[2] เงินค่าเล่าเรียน",
            ],
            'feeright'=>[
                "1" => "ตามสิทธิ",
                "2" => "เฉพาะส่วนที่ยังขาดจากสิทธิ",
            ],
            'feeagree'=>[
                "1" => "ข้าพเจ้ามีสิทธิ์ได้รับเงินช่วยเหลือตามพระราชกฤษฏีกาเงินสวัสดิการเกี่ยวกับการศึกษาของบุตร และข้อความที่ระบุข้างต้นเป้นความจริง",
                "2" => "บุตรของข้าพเจ้าอยู่ในข่ายได้รับความช่วยเหลือตามพระราชกฤษฏีกาเงินสวัสดิการเกี่ยวกับการศึกษาบุตร",
                "4" => "เป็นผู้ใช้สิทธิเบิกเงินช่วยเหลือตามพระราชกฤษฏีกาเงินสวัสดิการเกี่ยวกับการศึกษาบุตร แต่เพียงฝ่ายเดียว",
                "3" => "คู่สมรสของข้าพเจ้าได้รับความช่วยเหลือจากรัฐวิสาหกิจ หน่วยงานของทางราชการ ราชการส่วนท้องถิ่น กรุงเทพมหานคร องค์กรอิสระ องค์การมหาชน หรือหน่วยงานอื่นใด ต่ำกว่าจำนวนที่ได้รับจากทางราชการ",
            ],
        ];
        return ArrayHelper::getValue($items,$key,[]);
        //return array_key_exists($key, $items) ? $items[$key] : [];
    }
    public function getItemSpworktype()
    {
        return self::itemsAlias('spwork');
    }

    public function getItemBirthright()
    {
        return self::itemsAlias('birthright');
    }
    public function getItemChfee()
    {
        return self::itemsAlias('chfee');
    }
    public function getItemConfirm()
    {
        return self::itemsAlias('feeright');
    }
    public function getItemFeeagree()
    {
        return self::itemsAlias('feeagree');
    }
    public function getSpworktype(){
        return ArrayHelper::getValue($this->getItemSpworktype(),$this->ceg_spjobtype);
    }

    public function getBirthright(){
        return ArrayHelper::getValue($this->getItemBirthright(),$this->ceg_right);
    }
    public function getChfee(){
        return ArrayHelper::getValue($this->getItemChfee(),$this->ceg_feetype);
    }
    public function getFeeright(){
        return ArrayHelper::getValue($this->getItemConfirm(),$this->ceg_feeright);
    }
    public function getFeeagree(){
        return ArrayHelper::getValue($this->getItemConfirm(),$this->ceg_agree);
    }
}
