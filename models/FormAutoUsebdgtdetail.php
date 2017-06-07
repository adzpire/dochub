<?php

namespace backend\modules\dochub\models;

use Yii;

/**
 * This is the model class for table "form_auto_usebdgtdetail".
 *
 * @property integer $usebdgtdet_id
 * @property integer $usebdgtdet_ubid
 * @property string $usebdgtdet_title
 * @property integer $usebdgtdet_amount
 *
 * @property FormAutoUsebdgt $usebdgtdetUb
 */
class FormAutoUsebdgtdetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_auto_usebdgtdetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usebdgtdet_ubid', 'usebdgtdet_title', 'usebdgtdet_amount'], 'required'],
            [['usebdgtdet_ubid', 'usebdgtdet_amount'], 'integer'],
            [['usebdgtdet_title'], 'string', 'max' => 255],
            [['usebdgtdet_ubid'], 'exist', 'skipOnError' => true, 'targetClass' => FormAutoUsebdgt::className(), 'targetAttribute' => ['usebdgtdet_ubid' => 'usebdgt_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'usebdgtdet_id' => 'Usebdgtdet ID',
            'usebdgtdet_ubid' => 'Usebdgtdet Ubid',
            'usebdgtdet_title' => 'เรื่อง',
            'usebdgtdet_amount' => 'จำนวนเงิน',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsebdgtdetUb()
    {
        return $this->hasOne(FormAutoUsebdgt::className(), ['usebdgt_id' => 'usebdgtdet_ubid']);
    }
}
