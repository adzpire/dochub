<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\helpers\ArrayHelper;
use backend\modules\person\models\Person;
/**
 * This is the model class for table "form_auto_usebdgt".
 *
 * @property integer $usebdgt_id
 * @property integer $usebdgt_stid
 * @property string $usebdgt_date
 * @property string $usebdgt_year
 * @property string $usebdgt_reason
 * @property integer $usebdgt_bookno
 * @property string $usebdgt_bookdate
 * @property integer $usebdgt_headcmitt
 * @property integer $usebdgt_frstcmitt
 * @property integer $usebdgt_scndcmitt
 *
 * @property Person $usebdgtSt
 * @property Person $usebdgtHeadcmitt
 * @property Person $usebdgtFrstcmitt
 * @property Person $usebdgtScndcmitt
 * @property FormAutoUsebdgtdetail[] $formAutoUsebdgtdetails
 */
class FormAutoUsebdgt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_auto_usebdgt';
    }

    public static function fn()
    {
        return [
            'code' => 'usebudget',
            'name' => Yii::t('app', 'ขออนุมัติใช้เงินประจําปีงบประมาณ'),
            'icon' => 'bitcoin',
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($insert) {

            $ssmdl = new FormAutoSession();
            $ssmdl->fss_fid = $this->usebdgt_id;
            $ssmdl->fss_type = self::fn()['code'];
            //$ssmdl->save();
            if ($ssmdl->save()) {
            } else {
                print_r($ssmdl->getErrors());
                exit;
            }
        } else {
            $ssmdl = FormAutoSession::find()->where(['fss_fid' => $this->usebdgt_id, 'fss_type' => self::fn()['code']])->one();
            $ssmdl->updated_at = null;
            $ssmdl->updated_by = null;
            $ssmdl->save();
        }
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $model = FormAutoSession::find()->where(['fss_fid' => $this->usebdgt_id, 'fss_type' => self::fn()['code']])->one();
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
            [['usebdgt_stid', 'usebdgt_date', 'usebdgt_year', 'usebdgt_reason', 'usebdgt_bookno', 'usebdgt_bookdate', 'usebdgt_headcmitt'], 'required'],
            [['usebdgt_stid', 'usebdgt_bookno', 'usebdgt_headcmitt', 'usebdgt_frstcmitt', 'usebdgt_scndcmitt'], 'integer'],
            [['usebdgt_date', 'usebdgt_year', 'usebdgt_bookdate'], 'safe'],
            [['usebdgt_reason'], 'string'],
            [['usebdgt_stid'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['usebdgt_stid' => 'user_id']],
            [['usebdgt_headcmitt'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['usebdgt_headcmitt' => 'user_id']],
            [['usebdgt_frstcmitt'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['usebdgt_frstcmitt' => 'user_id']],
            [['usebdgt_scndcmitt'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['usebdgt_scndcmitt' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'usebdgt_id' => 'ID',
            'usebdgt_stid' => 'ผู้ขอ',
            'usebdgt_date' => 'วันที่',
            'usebdgt_year' => 'ปีงบประมาณ',
            'usebdgt_reason' => 'เหตุผลการซื้อ',
            'usebdgt_bookno' => 'หมายเลขหนังสือ',
            'usebdgt_bookdate' => 'วันที่หนังสือ',
            'usebdgt_headcmitt' => 'ประธานกรรมการ',
            'usebdgt_frstcmitt' => 'กรรมการที่ 1',
            'usebdgt_scndcmitt' => 'กรรมการที่ 2',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsebdgtSt()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'usebdgt_stid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsebdgtHeadcmitt()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'usebdgt_headcmitt']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsebdgtFrstcmitt()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'usebdgt_frstcmitt']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsebdgtScndcmitt()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'usebdgt_scndcmitt']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormAutoUsebdgtdetails()
    {
        return $this->hasMany(FormAutoUsebdgtdetail::className(), ['usebdgtdet_ubid' => 'usebdgt_id']);
    }

    public function getTitleList()
    {
        $data = $this->formAutoUsebdgtdetails;
        $doc = '<ul>';
        foreach($data as $book) {
            $doc .= '<li>'.$book->usebdgtdet_title.'</li>';
        }
        $doc .= '</ul>';
        return $doc;
    }
}
