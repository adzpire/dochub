<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

use backend\modules\person\models\Person;
/**
 * This is the model class for table "form_auto_session".
 *
 
 * @property integer $fss_id
 * @property integer $fss_fid
 * @property string $fss_type
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 * @property Person $createdBy
 * @property Person $updatedBy
 */
class FormAutoSession extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_auto_session';
    }
    public function behaviors()
    {
        return [
            BlameableBehavior::className(),
            TimestampBehavior::className(),
        ];
    }
public $createdByName; 
public $updatedByName; 
/*add rule in [safe]
'createdByName', 'updatedByName', 
join in searh()
$query->joinWith(['createdBy', 'updatedBy', ]);*/    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fss_fid', 'fss_type'], 'required'],
            [['fss_fid'], 'integer'],
            [['fss_type'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['created_by' => 'user_id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['updated_by' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fss_id' => 'ID',
            'fss_fid' => 'formID',
            'fss_type' => 'formtype',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'created_by']);
		
			/*
			$dataProvider->sort->attributes['createdByName'] = [
				'asc' => ['person.name' => SORT_ASC],
				'desc' => ['person.name' => SORT_DESC],
			];
			
			->andFilterWhere(['like', 'person.name', $this->createdByName])
			->orFilterWhere(['like', 'person.name1', $this->createdByName])
						in grid
			[
				'attribute' => 'createdByName',
				'value' => 'createdBy.name',
				'label' => $searchModel->attributeLabels()['created_by'],
				'filter' => \Person::createdByList,
			],
			
			in view
			[
				'label' => $model->attributeLabels()['created_by'],
				'value' => $model->createdBy->name,
				//'format' => ['date', 'long']
			],
			*/
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'updated_by']);
		
			/*
			$dataProvider->sort->attributes['updatedByName'] = [
				'asc' => ['person.name' => SORT_ASC],
				'desc' => ['person.name' => SORT_DESC],
			];
			
			->andFilterWhere(['like', 'person.name', $this->updatedByName])
			->orFilterWhere(['like', 'person.name1', $this->updatedByName])
						in grid
			[
				'attribute' => 'updatedByName',
				'value' => 'updatedBy.name',
				'label' => $searchModel->attributeLabels()['updated_by'],
				'filter' => \Person::updatedByList,
			],
			
			in view
			[
				'label' => $model->attributeLabels()['updated_by'],
				'value' => $model->updatedBy->name,
				//'format' => ['date', 'long']
			],
			*/
    }

public static function getFormAutoSessionList(){
		return ArrayHelper::map(self::find()->all(), 'id', 'title');
	}

    public static function farr($sel = 1){
        $farray[FormAutoExm::fn()['code']] = FormAutoExm::fn()['name'];
        $ficonarr[FormAutoExm::fn()['code']] = FormAutoExm::fn()['icon'];
        //--
        $farray[FormAutoUsebdgt::fn()['code']] = FormAutoUsebdgt::fn()['name'];
        $ficonarr[FormAutoUsebdgt::fn()['code']] = FormAutoUsebdgt::fn()['icon'];
        //--
        $farray[FormAutoCe::fn()['code']] = FormAutoCe::fn()['name'];
        $ficonarr[FormAutoCe::fn()['code']] = FormAutoCe::fn()['icon'];
        //--
        $farray[FormAutoCeg::fn()['code']] = FormAutoCeg::fn()['name'];
        $ficonarr[FormAutoCeg::fn()['code']] = FormAutoCeg::fn()['icon'];
        //--
        $farray[FormAutoHirbdgt::fn()['code']] = FormAutoHirbdgt::fn()['name'];
        $ficonarr[FormAutoHirbdgt::fn()['code']] = FormAutoHirbdgt::fn()['icon'];
        //--
        $farray[FormAutoMf::fn()['code']] = FormAutoMf::fn()['name'];
        $ficonarr[FormAutoMf::fn()['code']] = FormAutoMf::fn()['icon'];
        //--
        $farray[FormAutoMfg::fn()['code']] = FormAutoMfg::fn()['name'];
        $ficonarr[FormAutoMfg::fn()['code']] = FormAutoMfg::fn()['icon'];
        //--
        $farray[FormAutoPp::fn()['code']] = FormAutoPp::fn()['name'];
        $ficonarr[FormAutoPp::fn()['code']] = FormAutoPp::fn()['icon'];
        //--
        $farray[FormAutoBrmn::fn()['code']] = FormAutoBrmn::fn()['name'];
        $ficonarr[FormAutoBrmn::fn()['code']] = FormAutoBrmn::fn()['icon'];
        //--
        $farray[FormAutoUnplnbdgt::fn()['code']] = FormAutoUnplnbdgt::fn()['name'];
        $ficonarr[FormAutoUnplnbdgt::fn()['code']] = FormAutoUnplnbdgt::fn()['icon'];
        //--
        $farray[FormAutoLibraid::fn()['code']] = FormAutoLibraid::fn()['name'];
        $ficonarr[FormAutoLibraid::fn()['code']] = FormAutoLibraid::fn()['icon'];
        //--
        $farray[FormAutoRc::fn()['code']] = FormAutoRc::fn()['name'];
        $ficonarr[FormAutoRc::fn()['code']] = FormAutoRc::fn()['icon'];
        //--
        $farray[FormAutoBrrvmn::fn()['code']] = FormAutoBrrvmn::fn()['name'];
        $ficonarr[FormAutoBrrvmn::fn()['code']] = FormAutoBrrvmn::fn()['icon'];
        if($sel == 1){return $farray;}
        elseif ($sel == 2){return $ficonarr;}
    }
    public static function itemsAlias($key) {
        $items = [
            'form' => self::farr()
        ];
        return ArrayHelper::getValue($items, $key, []);
    }
    public function getItemForm() {
        return self::itemsAlias('form');
    }

    public function getForm() {
        return ArrayHelper::getValue($this->getItemForm(),$this->fss_type);
    }

 /*   public function getStatusLabel() {
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
