<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "lime_tokens_344789".
 *
 
 * @property integer $tid
 * @property string $participant_id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $emailstatus
 * @property string $token
 * @property string $language
 * @property string $blacklisted
 * @property string $sent
 * @property string $remindersent
 * @property integer $remindercount
 * @property string $completed
 * @property integer $usesleft
 * @property string $validfrom
 * @property string $validuntil
 * @property integer $mpid
 */
class LimeTokens extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lime_tokens_344789';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'emailstatus'], 'string'],
            [['remindercount', 'usesleft', 'mpid'], 'integer'],
            [['validfrom', 'validuntil'], 'safe'],
            [['participant_id'], 'string', 'max' => 50],
            [['firstname', 'lastname'], 'string', 'max' => 150],
            [['token'], 'string', 'max' => 35],
            [['language'], 'string', 'max' => 25],
            [['blacklisted', 'sent', 'remindersent', 'completed'], 'string', 'max' => 17],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tid' => 'Tid',
            'participant_id' => 'Participant ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'emailstatus' => 'Emailstatus',
            'token' => 'Token',
            'language' => 'Language',
            'blacklisted' => 'Blacklisted',
            'sent' => 'Sent',
            'remindersent' => 'Remindersent',
            'remindercount' => 'Remindercount',
            'completed' => 'Completed',
            'usesleft' => 'Usesleft',
            'validfrom' => 'Validfrom',
            'validuntil' => 'Validuntil',
            'mpid' => 'Mpid',
        ];
    }

public function getLimeTokensList(){
		return ArrayHelper::map(self::find()->all(), '', 'title');
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
