<?php

namespace backend\modules\dochub\models;

use Yii;
use backend\modules\person\models\Person;
/**
 * This is the model class for table "form_auto_hirbdgt".
 *
 * @property integer $hbdgt_id
 * @property integer $hbdgt_stid
 * @property string $hbdgt_date
 * @property string $hbdgt_job
 * @property string $hbdgt_org
 * @property string $hbdgt_reason
 * @property integer $hbdgt_tax
 *
 * @property Person $hbdgtSt
 * @property FormAutoHirbdgtdetail[] $formAutoHirbdgtdetails
 */
class FormAutoHirbdgt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_auto_hirbdgt';
    }
    public static function fn()
    {
        return [
            'code' => 'hirebudget',
            'name' => Yii::t('app', 'ขออนุมัติจัดจ้างนอกแผนการจัดซื้อประจำปี'),
            'icon' => 'briefcase',
        ];
    }
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($insert) {

            $ssmdl = new FormAutoSession();
            $ssmdl->fss_fid = $this->hbdgt_id;
            $ssmdl->fss_type = self::fn()['code'];
            //$ssmdl->save();
            if ($ssmdl->save()) {
            } else {
                print_r($ssmdl->getErrors());
                exit;
            }
        } else {
            $ssmdl = FormAutoSession::find()->where(['fss_fid' => $this->hbdgt_id, 'fss_type' => self::fn()['code']])->one();
            $ssmdl->updated_at = null;
            $ssmdl->updated_by = null;
            $ssmdl->save();
        }
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $model = FormAutoSession::find()->where(['fss_fid' => $this->hbdgt_id, 'fss_type' => self::fn()['code']])->one();
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
            [['hbdgt_stid', 'hbdgt_date', 'hbdgt_job', 'hbdgt_org', 'hbdgt_reason'], 'required'],
            [['hbdgt_stid', 'hbdgt_tax'], 'integer'],
            [['hbdgt_date'], 'safe'],
            [['hbdgt_reason'], 'string'],
            [['hbdgt_tax'], 'required', 'on' => 'updatetax'],
            ['hbdgt_tax', 'boolean'],
            [['hbdgt_job', 'hbdgt_org'], 'string', 'max' => 255],
            [['hbdgt_stid'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['hbdgt_stid' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hbdgt_id' => 'ID',
            'hbdgt_stid' => 'StaffID',
            'hbdgt_date' => 'วันที่',
            'hbdgt_job' => 'ด้วยงาน',
            'hbdgt_org' => 'จัดจ้างองค์กร/หน่วยงาน/บริษัท',
            'hbdgt_reason' => 'เพื่อการ',
            'hbdgt_tax' => 'คิดภาษี',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHbdgtSt()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'hbdgt_stid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormAutoHirbdgtdetails()
    {
        return $this->hasMany(FormAutoHirbdgtdetail::className(), ['hbdgtdet_hbid' => 'hbdgt_id']);
    }

    public function getTitleList()
    {
        $data = $this->formAutoHirbdgtdetails;
        $doc = '<ul>';
        foreach($data as $book) {
            $doc .= '<li>'.$book->hbdgtdet_title.'</li>';
        }
        $doc .= '</ul>';
        return $doc;
    }
    public function getAmountList()
    {
        $data = $this->formAutoHirbdgtdetails;
        $doc = '<ul>';
        foreach($data as $book) {
            $doc .= '<li>'.$book->hbdgtdet_amount.'</li>';
        }
        $doc .= '</ul>';
        return $doc;
    }
    public function getPriceList()
    {
        $data = $this->formAutoHirbdgtdetails;
        $doc = '<ul>';
        foreach($data as $book) {
            $doc .= '<li>'.$book->hbdgtdet_xpecprice.'</li>';
        }
        $doc .= '</ul>';
        return $doc;
    }
}
