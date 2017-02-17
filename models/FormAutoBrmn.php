<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\helpers\ArrayHelper;
use backend\modules\dochub\models\FormAutoSession;
use backend\modules\person\models\Person;

/**
 * This is the model class for table "form_auto_brmn".
 *
 * @property integer $brmn_id
 * @property integer $brmn_stid
 * @property integer $brmn_salary
 * @property integer $brmn_borrow
 * @property integer $brmn_choice
 * @property string $brmn_other
 * @property string $brmn_title
 * @property string $brmn_place
 * @property string $brmn_bdate
 * @property string $brmn_edate
 * @property Person $brmnSt
 */
class FormAutoBrmn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_auto_brmn';
    }

    const CHOICE_ARR = ['1' => 'ไปราชการ', '2' => 'ค่าวัสดุตามหนังสืออนุมัติ', '3' => 'เงินอื่นๆ'];
    const MODEL_NAME = 'ขออนุมัติยืมเงินรายได้มหาวิทยาลัย';
    public $brmnStName;

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            if ($this->brmn_choice == 3) {
//                $this->brmn_other = NULL;
                $this->brmn_title = NULL;
                $this->brmn_place = NULL;
                $this->brmn_bdate = NULL;
                $this->brmn_edate = NULL;
            }

            if ($this->brmn_choice == 2) {
                $this->brmn_other = NULL;
                $this->brmn_title = NULL;
                $this->brmn_place = NULL;
                $this->brmn_bdate = NULL;
                $this->brmn_edate = NULL;
            }

            if ($this->brmn_choice == 1) {
                $this->brmn_other = NULL;
//                $this->brmn_title = NULL;
//                $this->brmn_place = NULL;
//                $this->brmn_bdate = NULL;
//                $this->brmn_edate = NULL;
            }
            return true;
        } else {
            return false;
        }
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($insert) {

//        $month= "+".$this->duration_in_months." month";
//        $this->exp_date=date("Y-m-d H:i:s",strtotime($month));
//        $this->save(['exp_date']);
            $ssmdl = new FormAutoSession();
            $ssmdl->fss_fid = $this->brmn_id;
            $ssmdl->fss_type = 'formAutoBrmn';
            //$ssmdl->save();
            if ($ssmdl->save()) {
            } else {
                print_r($ssmdl->getErrors());
                exit;
            }
        } else {
            $ssmdl = FormAutoSession::find()->where(['fss_fid' => $this->brmn_id, 'fss_type' => 'formAutoBrmn'])->one();
            $ssmdl->updated_at = null;
            $ssmdl->updated_by = null;
            $ssmdl->save();
        }
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
//            if (($model = FormAutoSession::find()->where(['fss_fid' => $this->brmn_id, 'fss_type' => 'formAutoBrmn'])->one()) !== null) {
//                $model->delete();
//            } else {
//                throw new NotFoundHttpException('cannotdelsession');
//            }

//            return true;
            $model = FormAutoSession::find()->where(['fss_fid' => $this->brmn_id, 'fss_type' => 'formAutoBrmn'])->one();
            $model->delete();
            return true;
        } else {
            return false;
        }
    }
    /*add rule in [safe]
    'brmnStName',
    join in searh()
    $query->joinWith(['brmnSt', ]);*/
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brmn_stid', 'brmn_salary', 'brmn_borrow', 'brmn_choice'], 'required'],
            [['brmn_stid', 'brmn_salary', 'brmn_borrow', 'brmn_choice'], 'integer'],
            [['brmn_other', 'brmn_title'], 'string'],
            [['brmn_bdate', 'brmn_edate'], 'safe'],
            [['brmn_place'], 'string', 'max' => 255],
            [['brmn_stid'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['brmn_stid' => 'user_id']],
            [
                ['brmn_other'], 'required', 'when' => function ($model) {
                return $model->brmn_choice == '3';
            },
                'whenClient' => "function (attribute, value) { return $('#ptype').val() == '3'; }",
            ],
            [
                ['brmn_title', 'brmn_place', 'brmn_bdate', 'brmn_edate'], 'required', 'when' => function ($model) {
                return $model->brmn_choice == '1';
            },
                'whenClient' => "function (attribute, value) { return $('#ptype').val() == '1'; }",
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'brmn_id' => 'ID',
            'brmn_stid' => 'StaffID',
            'brmn_salary' => 'เงินเดือน',
            'brmn_borrow' => 'จำนวนยืม',
            'brmn_choice' => 'เหตุผล',
            'brmn_other' => 'อื่น',
            'brmn_title' => 'ราชการ-เรื่อง',
            'brmn_place' => 'ราชการ-ที่',
            'brmn_bdate' => 'ราชการ-วันเริ่มต้น',
            'brmn_edate' => 'ราชการ-วันสิ้นสุด',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSs()
    {
        return $this->hasOne(FormAutoSession::className(), ['fss_fid' => 'brmn_id'])->where(['fss_type' => 'formAutoBrmn']);
    }

    public function getBrmnSt()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'brmn_stid']);

        /*
        $dataProvider->sort->attributes['brmnStName'] = [
            'asc' => ['person.name' => SORT_ASC],
            'desc' => ['person.name' => SORT_DESC],
        ];

        ->andFilterWhere(['like', 'person.name', $this->brmnStName])
        ->orFilterWhere(['like', 'person.name1', $this->brmnStName])
                    in grid
        [
            'attribute' => 'brmnStName',
            'value' => 'brmnSt.name',
            'label' => $searchModel->attributeLabels()['brmn_stid'],
            'filter' => \Person::brmnStList,
        ],

        in view
        [
            'label' => $model->attributeLabels()['brmn_stid'],
            'value' => $model->brmnSt->name,
            //'format' => ['date', 'long']
        ],
        */
    }

    public static function getFormAutoBrmnList()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'title');
    }

    public function Showchoice($id)
    {

        /*$data = DepTransaction::findOne($this->id);

        if ($data->credit != 0) {
            $cap_bal = $cap_bal + ($data->credit - $data->debit);
        }

        if ($data->debit != 0) {
            $int_bal = $int_bal + ($data->credit - $data->debit);
        }

        $total = $cap_bal + $int_bal;*/

        return $this::CHOICE_ARR[$id];
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
