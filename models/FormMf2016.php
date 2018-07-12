<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "form_mf2016".
 *
 
 * @property integer $fid
 * @property integer $mf_stid
 * @property string $mf_ill
 * @property string $mf_hospital
 * @property integer $mf_want
 * @property integer $mf_choice
 * @property string $mf_date
 */
class FormMf2016 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_mf2016';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mf_stid', 'mf_ill', 'mf_hospital', 'mf_want', 'mf_choice', 'mf_date'], 'required'],
            [['mf_stid', 'mf_want', 'mf_choice'], 'integer'],
            [['mf_ill'], 'string'],
            [['mf_date'], 'safe'],
            [['mf_hospital'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fid' => 'ID',
            'mf_stid' => 'staffID',
            'mf_ill' => 'โรค',
            'mf_hospital' => 'โรงพยาบาล',
            'mf_want' => 'จำนวนที่ต้องการ',
            'mf_choice' => 'ตัวเลือก',
            'mf_date' => 'วันที่',
        ];
    }

public function getFormMf2016List(){
		return ArrayHelper::map(self::find()->all(), 'id', 'title');
	}

/*


public static function itemsAlias($key) {
        $items = [
            'status' => [
                0 => Yii::t('app', 'ร่าง'),
                1 => Yii::t('app', 'เสนอ'),
                2 => Yii::t('app', 'อนุมัติ'),
                3 => Yii::t('app', 'ไม่อนุมัติ'),
                4 => Yii::t('app', 'คืนแล้ว'),
            ],
            'statusCondition'=>[
                1 => Yii::t('app', 'อนุมัติ'),
                0 => Yii::t('app', 'ไม่อนุมัติ'),
            ]
        ];
        return ArrayHelper::getValue($items, $key, []);
    }

    public function getStatusLabel() {
        $status = ArrayHelper::getValue($this->getItemStatus(), $this->status);
        $status = ($this->status === NULL) ? ArrayHelper::getValue($this->getItemStatus(), 0) : $status;
        switch ($this->status) {
            case 0 :
            case NULL :
                $str = '<span class="label label-warning">' . $status . '</span>';
                break;
            case 1 :
                $str = '<span class="label label-primary">' . $status . '</span>';
                break;
            case 2 :
                $str = '<span class="label label-success">' . $status . '</span>';
                break;
            case 3 :
                $str = '<span class="label label-danger">' . $status . '</span>';
                break;
            case 4 :
                $str = '<span class="label label-succes">' . $status . '</span>';
                break;
            default :
                $str = $status;
                break;
        }

        return $str;
    }

    public static function getItemStatus() {
        return self::itemsAlias('status');
    }
    
    public static function getItemStatusConsider() {
        return self::itemsAlias('statusCondition');       
    }
*/
}
