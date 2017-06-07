<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\helpers\ArrayHelper;
use backend\modules\person\models\Person;
/**
 * This is the model class for table "form_auto_libraid".
 *
 * @property integer $libaid_id
 * @property integer $libaid_stid
 * @property string $libaid_date
 * @property string $libaid_year
 * @property integer $libaid_reqamount
 *
 * @property Person $libaidSt
 * @property FormAutoLibraidetail[] $formAutoLibraidetails
 */
class FormAutoLibraid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_auto_libraid';
    }
    public static function fn()
    {
        return [
            'code' => 'biblioaid',
            'name' => Yii::t('app', 'ขออนุมัติเบิกเงินค่าบรรณสารสงเคราะห์ จากเงินรายได้'),
            'icon' => 'book',
        ];
    }
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($insert) {

            $ssmdl = new FormAutoSession();
            $ssmdl->fss_fid = $this->libaid_id;
            $ssmdl->fss_type = self::fn()['code'];
            //$ssmdl->save();
            if ($ssmdl->save()) {
            } else {
                print_r($ssmdl->getErrors());
                exit;
            }
        } else {
            $ssmdl = FormAutoSession::find()->where(['fss_fid' => $this->libaid_id, 'fss_type' => self::fn()['code']])->one();
            $ssmdl->updated_at = null;
            $ssmdl->updated_by = null;
            $ssmdl->save();
        }
    }
    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $model = FormAutoSession::find()->where(['fss_fid' => $this->libaid_id, 'fss_type' => self::fn()['code']])->one();
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
            [['libaid_stid', 'libaid_date', 'libaid_year', 'libaid_reqamount'], 'required'],
            [['libaid_stid', 'libaid_reqamount'], 'integer'],
            [['libaid_date', 'libaid_year'], 'safe'],
            [['libaid_stid'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['libaid_stid' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'libaid_id' => 'ID',
            'libaid_stid' => 'ผู้ขอ',
            'libaid_date' => 'วันที่',
            'libaid_year' => 'ปีงบประมาณ',
            'libaid_reqamount' => 'จำนวนเงินที่ขอเบิก',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibaidSt()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'libaid_stid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormAutoLibraidetails()
    {
        return $this->hasMany(FormAutoLibraidetail::className(), ['libraidet_mainid' => 'libaid_id']);
    }
}
