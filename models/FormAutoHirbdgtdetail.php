<?php

namespace backend\modules\dochub\models;

use Yii;

/**
 * This is the model class for table "form_auto_hirbdgtdetail".
 *
 * @property integer $hbdgtdet_id
 * @property integer $hbdgtdet_hbid
 * @property string $hbdgtdet_title
 * @property integer $hbdgtdet_amount
 * @property string $hbdgtdet_unit
 * @property integer $hbdgtdet_xpecprice
 * @property integer $hbdgtdet_price
 *
 * @property FormAutoHirbdgt $hbdgtdetHb
 */
class FormAutoHirbdgtdetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_auto_hirbdgtdetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hbdgtdet_hbid', 'hbdgtdet_title', 'hbdgtdet_unit'], 'required'],
            [['hbdgtdet_hbid', 'hbdgtdet_amount', 'hbdgtdet_xpecprice', 'hbdgtdet_price'], 'integer'],
            [['hbdgtdet_title', 'hbdgtdet_unit'], 'string', 'max' => 255],
            [['hbdgtdet_hbid'], 'exist', 'skipOnError' => true, 'targetClass' => FormAutoHirbdgt::className(), 'targetAttribute' => ['hbdgtdet_hbid' => 'hbdgt_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hbdgtdet_id' => 'ID',
            'hbdgtdet_hbid' => 'unpID',
            'hbdgtdet_title' => 'รายการ',
            'hbdgtdet_amount' => 'จำนวนหน่วย',
            'hbdgtdet_unit' => 'หน่วยนับ',
            'hbdgtdet_xpecprice' => 'ราคาที่สืบทราบ(ต่อหน่วย)',
            'hbdgtdet_price' => 'ราคารวม',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHbdgtdetHb()
    {
        return $this->hasOne(FormAutoHirbdgt::className(), ['hbdgt_id' => 'hbdgtdet_hbid']);
    }
}
