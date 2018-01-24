<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\helpers\ArrayHelper;
use backend\modules\course\models\MainCourse;
/**
 * This is the model class for table "form_auto_exm_detail".
 *
 * @property integer $exminfo_id
 * @property integer $exminfo_exmid
 * @property integer $exminfo_course
 * @property integer $exminfo_type
 * @property integer $exminfo_degree
 * @property integer $exminfo_hour
 * @property integer $exminfo_stdamount
 * @property double $exminfo_fee
 * @property string $exminfo_note
 *
 * @property FormAutoExm $exminfoExm
 * @property MainCourse $exminfoCourse
 */
class FormAutoExmDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_auto_exm_detail';
    }
//    const EXAM_TYPE = [
//        "1" => "อัตนัย",
//        "2" => "ปรนัย",
//        "3" => "อัตนัยและปรนัย",
//        "4" => "สัมภาษณ์หรือภาคปฏิบัติ",
//    ];
//    const DEGREE = [
//        "1" => "ปริญญาตรี",
//        "2" => "ปริญญาโท",
//    ];
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['exminfo_exmid', 'exminfo_course'], 'required'],
            [['exminfo_exmid', 'exminfo_course', 'exminfo_type', 'exminfo_degree', 'exminfo_hour', 'exminfo_stdamount'], 'integer'],
            [['exminfo_fee'], 'number'],
            [['exminfo_note'], 'string'],
            [['exminfo_exmid'], 'exist', 'skipOnError' => true, 'targetClass' => FormAutoExm::className(), 'targetAttribute' => ['exminfo_exmid' => 'exmmain_id']],
            [['exminfo_course'], 'exist', 'skipOnError' => true, 'targetClass' => MainCourse::className(), 'targetAttribute' => ['exminfo_course' => 'c_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'exminfo_id' => 'ID',
            'exminfo_exmid' => 'exmainID',
            'exminfo_course' => 'วิชาที่สอบ',
            'exminfo_type' => 'ชนิดข้อสอบ',
            'exminfo_degree' => 'ปริญญา',
            'exminfo_hour' => 'ชั่วโมงที่สอบ',
            'exminfo_stdamount' => 'จำนวนผู้เข้าสอบ',
            'exminfo_fee' => 'ค่าตรวจ',
            'exminfo_note' => 'หมายเหตุ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExminfoExm()
    {
        return $this->hasOne(FormAutoExm::className(), ['exmmain_id' => 'exminfo_exmid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExminfoCourse()
    {
        return $this->hasOne(MainCourse::className(), ['c_id' => 'exminfo_course']);
    }

    public static function itemsAlias($key){

        $items = [
            'examtype'=>[
                "1" => "อัตนัย",
                "2" => "ปรนัย",
                "3" => "อัตนัยและปรนัย",
                "4" => "สัมภาษณ์หรือภาคปฏิบัติ",
            ],
            'degree'=>[
                "1" => "ปริญญาตรี",
                "2" => "ปริญญาโท",
            ],
        ];
        return ArrayHelper::getValue($items,$key,[]);
        //return array_key_exists($key, $items) ? $items[$key] : [];
    }
    public function getItemEtype()
    {
        return self::itemsAlias('examtype');
    }

    public function getItemDegree()
    {
        return self::itemsAlias('degree');
    }
    public function getEtype(){
        return ArrayHelper::getValue($this->getItemEtype(),$this->exminfo_type);
    }

    public function getDegree(){
        return ArrayHelper::getValue($this->getItemDegree(),$this->exminfo_degree);
    }
}
