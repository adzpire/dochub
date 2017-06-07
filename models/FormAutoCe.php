<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\helpers\ArrayHelper;
use backend\modules\person\models\Person;
use backend\modules\thailocale\models\LocaleAmphur;
use backend\modules\thailocale\models\LocaleProvince;
/**
 * This is the model class for table "form_auto_ce".
 *
 * @property integer $fid
 * @property string $ce_spname
 * @property integer $ce_spjobtype
 * @property string $ce_spposition
 * @property string $ce_spbelong
 * @property integer $ce_hasbright
 * @property integer $ce_feetype
 * @property string $ce_ch1name
 * @property string $ce_ch1birth
 * @property integer $ce_ch1dadorder
 * @property integer $ce_ch1momorder
 * @property integer $ce_ch1reporder
 * @property string $ce_ch1repname
 * @property string $ce_ch1repbirth
 * @property string $ce_ch1repdeath
 * @property string $ce_ch1schl
 * @property string $ce_ch1schlamphur
 * @property string $ce_ch1schlprovince
 * @property string $ce_ch1schlclass
 * @property integer $ce_ch1fee1
 * @property integer $ce_ch1fee2
 * @property string $ce_ch2name
 * @property string $ce_ch2birth
 * @property integer $ce_ch2dadorder
 * @property integer $ce_ch2momorder
 * @property integer $ce_ch2reporder
 * @property string $ce_ch2repname
 * @property string $ce_ch2repbirth
 * @property string $ce_ch2repdeath
 * @property string $ce_ch2schl
 * @property string $ce_ch2schlamphur
 * @property string $ce_ch2schlprovince
 * @property string $ce_ch2schlclass
 * @property integer $ce_ch2fee1
 * @property integer $ce_ch2fee2
 * @property string $ce_ch3name
 * @property string $ce_ch3birth
 * @property integer $ce_ch3dadorder
 * @property integer $ce_ch3momorder
 * @property integer $ce_ch3reporder
 * @property string $ce_ch3repname
 * @property string $ce_ch3repbirth
 * @property string $ce_ch3repdeath
 * @property string $ce_ch3schl
 * @property string $ce_ch3schlamphur
 * @property string $ce_ch3schlprovince
 * @property string $ce_ch3schlclass
 * @property integer $ce_ch3fee1
 * @property integer $ce_ch3fee2
 * @property integer $ce_whole
 * @property integer $ce_half
 * @property integer $ce_piece
 * @property integer $ce_sum
 * @property integer $ce_agree
 * @property integer $ce_agreemoney
 * @property string $ce_date
 * @property string $ce_accname
 * @property string $ce_accnum
 * @property integer $ce_stid
 *
 * @property Person $ceSt
 * @property LocaleAmphur $ceCh1schlamphur
 * @property LocaleProvince $ceCh1schlprovince
 * @property LocaleAmphur $ceCh2schlamphur
 * @property LocaleProvince $ceCh2schlprovince
 * @property LocaleAmphur $ceCh3schlamphur
 * @property LocaleProvince $ceCh3schlprovince
 */
class FormAutoCe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_auto_ce';
    }
    public static function fn()
    {
        return [
            'code' => 'childedu',
            'name' => Yii::t('app', 'ใบเบิกเงินสวัสดิการเกี่ยวกับการศึกษาของบุตรพนักงานมหาวิทยาลัยฯ'),
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
            [['ce_spname', 'ce_spjobtype', 'ce_feetype', 'ce_ch1name', 'ce_ch1birth', 'ce_ch1schl', 'ce_ch1schlamphur', 'ce_ch1schlprovince', 'ce_ch1schlclass', 'ce_agree', 'ce_date', 'ce_accname', 'ce_accnum', 'ce_stid'], 'required'],
            [['ce_spjobtype', 'ce_hasbright', 'ce_feetype', 'ce_ch1dadorder', 'ce_ch1momorder', 'ce_ch1reporder', 'ce_ch1schlamphur', 'ce_ch1schlprovince', 'ce_ch1fee1', 'ce_ch1fee2', 'ce_ch2dadorder', 'ce_ch2momorder', 'ce_ch2reporder', 'ce_ch2schlamphur', 'ce_ch2schlprovince', 'ce_ch2fee1', 'ce_ch2fee2', 'ce_ch3dadorder', 'ce_ch3momorder', 'ce_ch3reporder', 'ce_ch3schlamphur', 'ce_ch3schlprovince', 'ce_ch3fee1', 'ce_ch3fee2', 'ce_whole', 'ce_half', 'ce_piece', 'ce_sum', 'ce_agree', 'ce_agreemoney', 'ce_stid'], 'integer'],
            [['ce_ch1birth', 'ce_ch1repbirth', 'ce_ch1repdeath', 'ce_ch2birth', 'ce_ch2repbirth', 'ce_ch2repdeath', 'ce_ch3birth', 'ce_ch3repbirth', 'ce_ch3repdeath', 'ce_date'], 'safe'],
            [['ce_spname', 'ce_spposition', 'ce_spbelong', 'ce_ch1name', 'ce_ch1repname', 'ce_ch1schl', 'ce_ch1schlclass', 'ce_ch2name', 'ce_ch2repname', 'ce_ch2schl', 'ce_ch2schlclass', 'ce_ch3name', 'ce_ch3repname', 'ce_ch3schl', 'ce_ch3schlclass', 'ce_accname', 'ce_accnum'], 'string', 'max' => 255],
            [['ce_stid'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['ce_stid' => 'user_id']],
            [['ce_ch1schlamphur'], 'exist', 'skipOnError' => true, 'targetClass' => LocaleAmphur::className(), 'targetAttribute' => ['ce_ch1schlamphur' => 'AMPHUR_ID']],
            [['ce_ch1schlprovince'], 'exist', 'skipOnError' => true, 'targetClass' => LocaleProvince::className(), 'targetAttribute' => ['ce_ch1schlprovince' => 'PROVINCE_ID']],
            [['ce_ch2schlamphur'], 'exist', 'skipOnError' => true, 'targetClass' => LocaleAmphur::className(), 'targetAttribute' => ['ce_ch2schlamphur' => 'AMPHUR_ID']],
            [['ce_ch2schlprovince'], 'exist', 'skipOnError' => true, 'targetClass' => LocaleProvince::className(), 'targetAttribute' => ['ce_ch2schlprovince' => 'PROVINCE_ID']],
            [['ce_ch3schlamphur'], 'exist', 'skipOnError' => true, 'targetClass' => LocaleAmphur::className(), 'targetAttribute' => ['ce_ch3schlamphur' => 'AMPHUR_ID']],
            [['ce_ch3schlprovince'], 'exist', 'skipOnError' => true, 'targetClass' => LocaleProvince::className(), 'targetAttribute' => ['ce_ch3schlprovince' => 'PROVINCE_ID']],
            [
                ['ce_spposition', 'ce_spbelong'], 'required', 'when' => function ($model) {
                    return $model->ce_spjobtype == '2';
                },
                'whenClient' => "function (attribute, value) { return $('#spjtype').val() == '2'; }",
            ],
            [
                ['ce_spposition', 'ce_spbelong'], 'required', 'when' => function ($model) {
                return $model->ce_spjobtype == '3';
                },
                'whenClient' => "function (attribute, value) { return $('#spjtype').val() == '3'; }",
            ],
            [
                ['ce_spposition', 'ce_spbelong'], 'required', 'when' => function ($model) {
                return $model->ce_spjobtype == '4';
                },
                'whenClient' => "function (attribute, value) { return $('#spjtype').val() == '4'; }",
            ],
            [
                ['ce_agreemoney'], 'required', 'when' => function ($model) {
                return $model->ce_agree == '3';
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
            'ce_spname' => 'คู่สมรส-ชื่อ',
            'ce_spjobtype' => 'คู่สมรส-ประเภทงาน',
            'ce_spposition' => 'คู่สมรส-ตำแหน่ง',
            'ce_spbelong' => 'คู่สมรส-สังกัด',
            'ce_hasbright' => 'ประเภทบุตร',
            'ce_feetype' => 'ประเภทเงิน',
            'ce_ch1name' => 'บุตร1-ชื่อ',
            'ce_ch1birth' => 'บุตร1-วันเกิด',
            'ce_ch1dadorder' => 'บุตร1-ลูกคนที่ของพ่อ',
            'ce_ch1momorder' => 'บุตร1-ลูกคนที่ของแม่',
            'ce_ch1reporder' => 'บุตร1-ลำดับบุตรแทนที่',
            'ce_ch1repname' => 'บุตร1-ชื่อบุตรแทนที่',
            'ce_ch1repbirth' => 'บุตร1-วันเกิดบุตรแทนที่',
            'ce_ch1repdeath' => 'บุตร1-วันตายบุตรแทนที่',
            'ce_ch1schl' => 'บุตร1-โรงเรียน',
            'ce_ch1schlamphur' => 'บุตร1-อำเภอโรงเรียน',
            'ce_ch1schlprovince' => 'บุตร1-จังหวัดโรงเรียน',
            'ce_ch1schlclass' => 'บุตร1-ชั้นเรียน',
            'ce_ch1fee1' => 'บุตร1-จำนวนเงิน1',
            'ce_ch1fee2' => 'บุตร1-จำนวนเงิน2',
            'ce_ch2name' => 'บุตร2-ชื่อ',
            'ce_ch2birth' => 'บุตร2-วันเกิด',
            'ce_ch2dadorder' => 'บุตร2-ลูกคนที่ของพ่อ',
            'ce_ch2momorder' => 'บุตร2-ลูกคนที่ของแม่',
            'ce_ch2reporder' => 'บุตร2-ลำดับบุตรแทนที่',
            'ce_ch2repname' => 'บุตร2-ชื่อบุตรแทนที่',
            'ce_ch2repbirth' => 'บุตร2-วันเกิดบุตรแทนที่',
            'ce_ch2repdeath' => 'บุตร2-วันตายบุตรแทนที่',
            'ce_ch2schl' => 'บุตร2-โรงเรียน',
            'ce_ch2schlamphur' => 'บุตร2-อำเภอโรงเรียน',
            'ce_ch2schlprovince' => 'บุตร2-จังหวัดโรงเรียน',
            'ce_ch2schlclass' => 'บุตร2-ชั้นเรียน',
            'ce_ch2fee1' => 'บุตร2-จำนวนเงิน1',
            'ce_ch2fee2' => 'บุตร2-จำนวนเงิน2',
            'ce_ch3name' => 'บุตร3-ชื่อ',
            'ce_ch3birth' => 'บุตร3-วันเกิด',
            'ce_ch3dadorder' => 'บุตร3-ลูกคนที่ของพ่อ',
            'ce_ch3momorder' => 'บุตร3-ลูกคนที่ของแม่',
            'ce_ch3reporder' => 'บุตร3-ลำดับบุตรแทนที่',
            'ce_ch3repname' => 'บุตร3-ชื่อบุตรแทนที่',
            'ce_ch3repbirth' => 'บุตร3-วันเกิดบุตรแทนที่',
            'ce_ch3repdeath' => 'บุตร3-วันตายบุตรแทนที่',
            'ce_ch3schl' => 'บุตร3-โรงเรียน',
            'ce_ch3schlamphur' => 'บุตร3-อำเภอโรงเรียน',
            'ce_ch3schlprovince' => 'บุตร3-จังหวัดโรงเรียน',
            'ce_ch3schlclass' => 'บุตร3-ชั้นเรียน',
            'ce_ch3fee1' => 'บุตร3-จำนวนเงิน1',
            'ce_ch3fee2' => 'บุตร3-จำนวนเงิน2',
            'ce_whole' => 'เงินเต็มจำนวน',
            'ce_half' => 'เงินครึ่งหนึ่ง',
            'ce_piece' => 'เงินส่วนที่ขาด',
            'ce_sum' => 'เงินรวม',
            'ce_agree' => 'ประเภทสิทธิ์',
            'ce_agreemoney' => 'เงินคู่สมรสได้รับ',
            'ce_date' => 'วันที่',
            'ce_accname' => 'ชื่อบัญชี',
            'ce_accnum' => 'หมายเลขบัญชี',
            'ce_stid' => 'staffID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCeSt()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'ce_stid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCeCh1schlamphur()
    {
        return $this->hasOne(LocaleAmphur::className(), ['AMPHUR_ID' => 'ce_ch1schlamphur']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCeCh1schlprovince()
    {
        return $this->hasOne(LocaleProvince::className(), ['PROVINCE_ID' => 'ce_ch1schlprovince']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCeCh2schlamphur()
    {
        return $this->hasOne(LocaleAmphur::className(), ['AMPHUR_ID' => 'ce_ch2schlamphur']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCeCh2schlprovince()
    {
        return $this->hasOne(LocaleProvince::className(), ['PROVINCE_ID' => 'ce_ch2schlprovince']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCeCh3schlamphur()
    {
        return $this->hasOne(LocaleAmphur::className(), ['AMPHUR_ID' => 'ce_ch3schlamphur']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCeCh3schlprovince()
    {
        return $this->hasOne(LocaleProvince::className(), ['PROVINCE_ID' => 'ce_ch3schlprovince']);
    }

    public static function itemsAlias($key){

        $items = [
            'spwork'=>[
                "1" => "ไม่เป็นข้าราชการหรือลูกจ้างประจำ",
                "2" => "เป็นข้าราชการ",
                "3" => "ลูกจ้างประจำ",
                "4" => "เป็นพนักงานในหน่วยงานของส่วนราชการหรือของราชการส่วนท้องถิ่น",
                "5" => "เป็นพนักงานหรือลูกจ้างในรัฐวิสาหกิจ",
            ],
            'birthright'=>[
                "0" => "-",
                "1" => "บุตรอยู่ในความปกครองของข้าพเจ้าโดยการหย่า หรือมิได้สมรสกันตามกฏหมาย หรือสามีถึงแก่กรรมแล้ว",
                "2" => "บุตรอยู่ในความอุปการะเลี้ยงดูของข้าพเจ้า เนื่องจากแยกกันอยู่โดยมิได้หย่าตามกฏหมาย",
            ],
            'chfee'=>[
                "1" => "[1] เงินบำรุงการศึกษา",
                "2" => "[2] เงินค่าเล่าเรียน",
            ],
            'confirm'=>[
                "1" => "ข้าพเจ้ามีสิทธิ์ได้รับเงินช่วยเหลือตามระเบียบกองทุนพนักงานมหาวิทยาลัยสงขลานครินทร์ ว่าด้วยการจัดการสวัสดิการเกี่ยวกับการรักษาพยาบาลและการศึกษาของบุตรพนักงานมหาวิทยาลัย พ.ศ. 2551",
                "2" => "สามีของข้าพเจ้ามิได้ใช้สิทธิ์ขอรับเงินช่วยเหลือจากหน่วยงานที่สังกัด",
                "3" => "คู่สมรสของข้าพเจ้าได้รับการช่วยเหลือจากรัฐวิสาหกิจหรือหน่วยงานของส่วนราชการหรือของราชการส่วนท้องถิ่นต่ำกว่า จำนวนที่ได้รับตามสิทธิ์ที่พึงมีพึงได้",
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
    public static function getItemChfee()
    {
        return self::itemsAlias('chfee');
    }
    public function getItemConfirm()
    {
        return self::itemsAlias('confirm');
    }
    public function getSpworktype(){
        return ArrayHelper::getValue($this->getItemSpworktype(),$this->ce_spjobtype);
    }

    public function getBirthright(){
        return ArrayHelper::getValue($this->getItemBirthright(),$this->ce_hasbright);
    }
    public function getChfee(){
        return ArrayHelper::getValue($this->getItemChfee(),$this->ce_feetype);
    }
    public function getConfirm(){
        return ArrayHelper::getValue($this->getItemConfirm(),$this->ce_agree);
    }
}
