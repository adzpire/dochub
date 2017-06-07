<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\helpers\ArrayHelper;
use backend\modules\person\models\Person;
/**
 * This is the model class for table "form_auto_exm".
 *
 * @property integer $exmmain_id
 * @property integer $exmmain_semester
 * @property string $exmmain_year
 * @property integer $exmmain_stid
 *
 * @property Person $exmmainSt
 * @property FormAutoExmDetail[] $formAutoExmDetails
 */
class FormAutoExm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_auto_exm';
    }
    public static function fn()
    {
        return [
            'code' => 'examfee',
            'name' => Yii::t('app', 'ใบเบิกค่าตรวจสอบข้อสอบ'),
            'icon' => 'ok-circle',
        ];
    }
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($insert) {

            $ssmdl = new FormAutoSession();
            $ssmdl->fss_fid = $this->exmmain_id;
            $ssmdl->fss_type = self::fn()['code'];
            //$ssmdl->save();
            if ($ssmdl->save()) {
            } else {
                print_r($ssmdl->getErrors());
                exit;
            }
        } else {
            $ssmdl = FormAutoSession::find()->where(['fss_fid' => $this->exmmain_id, 'fss_type' => self::fn()['code']])->one();
            $ssmdl->updated_at = null;
            $ssmdl->updated_by = null;
            $ssmdl->save();
        }
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $model = FormAutoSession::find()->where(['fss_fid' => $this->exmmain_id, 'fss_type' => self::fn()['code']])->one();
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
            [['exmmain_semester', 'exmmain_year', 'exmmain_stid'], 'required'],
            [['exmmain_semester', 'exmmain_stid'], 'integer'],
            [['exmmain_year'], 'safe'],
            [['exmmain_stid'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['exmmain_stid' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'exmmain_id' => 'ID',
            'exmmain_semester' => 'ภาคเรียนที่',
            'exmmain_year' => 'ปีการศึกษา',
            'exmmain_stid' => 'staffID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExmmainSt()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'exmmain_stid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormAutoExmDetails()
    {
        return $this->hasMany(FormAutoExmDetail::className(), ['exminfo_exmid' => 'exmmain_id']);
    }
}
