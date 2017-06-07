<?php

namespace backend\modules\dochub\models;

use Yii;

/**
 * This is the model class for table "form_auto_libraidetail".
 *
 * @property integer $libraidet_id
 * @property integer $libraidet_mainid
 * @property string $libraidet_org
 * @property integer $libraidet_recptno
 * @property integer $libraidet_amount
 *
 * @property FormAutoLibraid $libraidetMain
 */
class FormAutoLibraidetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_auto_libraidetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['libraidet_mainid', 'libraidet_org', 'libraidet_recptno', 'libraidet_amount'], 'required'],
            [['libraidet_mainid', 'libraidet_recptno', 'libraidet_amount'], 'integer'],
            [['libraidet_org'], 'string', 'max' => 255],
            [['libraidet_mainid'], 'exist', 'skipOnError' => true, 'targetClass' => FormAutoLibraid::className(), 'targetAttribute' => ['libraidet_mainid' => 'libaid_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'libraidet_id' => 'ID',
            'libraidet_mainid' => 'mainID',
            'libraidet_org' => 'บริษัท/ห้าง/ร้าน',
            'libraidet_recptno' => 'ใบเสร็จเล่มที่',
            'libraidet_amount' => 'จำนวนเงิน',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibraidetMain()
    {
        return $this->hasOne(FormAutoLibraid::className(), ['libaid_id' => 'libraidet_mainid']);
    }
}
