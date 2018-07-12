<?php

namespace backend\modules\dochub\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "lime_surveys_languagesettings".
 *
 
 * @property integer $surveyls_survey_id
 * @property string $surveyls_language
 * @property string $surveyls_title
 * @property string $surveyls_description
 * @property string $surveyls_welcometext
 * @property string $surveyls_endtext
 * @property string $surveyls_url
 * @property string $surveyls_urldescription
 * @property string $surveyls_email_invite_subj
 * @property string $surveyls_email_invite
 * @property string $surveyls_email_remind_subj
 * @property string $surveyls_email_remind
 * @property string $surveyls_email_register_subj
 * @property string $surveyls_email_register
 * @property string $surveyls_email_confirm_subj
 * @property string $surveyls_email_confirm
 * @property integer $surveyls_dateformat
 * @property string $surveyls_attributecaptions
 * @property string $email_admin_notification_subj
 * @property string $email_admin_notification
 * @property string $email_admin_responses_subj
 * @property string $email_admin_responses
 * @property integer $surveyls_numberformat
 * @property string $attachments
 */
class LimeSurveysLanguagesettings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lime_surveys_languagesettings';
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
            [['surveyls_survey_id', 'surveyls_language', 'surveyls_title'], 'required'],
            [['surveyls_survey_id', 'surveyls_dateformat', 'surveyls_numberformat'], 'integer'],
            [['surveyls_description', 'surveyls_welcometext', 'surveyls_endtext', 'surveyls_url', 'surveyls_email_invite', 'surveyls_email_remind', 'surveyls_email_register', 'surveyls_email_confirm', 'surveyls_attributecaptions', 'email_admin_notification', 'email_admin_responses', 'attachments'], 'string'],
            [['surveyls_language'], 'string', 'max' => 45],
            [['surveyls_title'], 'string', 'max' => 200],
            [['surveyls_urldescription', 'surveyls_email_invite_subj', 'surveyls_email_remind_subj', 'surveyls_email_register_subj', 'surveyls_email_confirm_subj', 'email_admin_notification_subj', 'email_admin_responses_subj'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'surveyls_survey_id' => 'Surveyls Survey ID',
            'surveyls_language' => 'Surveyls Language',
            'surveyls_title' => 'Surveyls Title',
            'surveyls_description' => 'Surveyls Description',
            'surveyls_welcometext' => 'Surveyls Welcometext',
            'surveyls_endtext' => 'Surveyls Endtext',
            'surveyls_url' => 'Surveyls Url',
            'surveyls_urldescription' => 'Surveyls Urldescription',
            'surveyls_email_invite_subj' => 'Surveyls Email Invite Subj',
            'surveyls_email_invite' => 'Surveyls Email Invite',
            'surveyls_email_remind_subj' => 'Surveyls Email Remind Subj',
            'surveyls_email_remind' => 'Surveyls Email Remind',
            'surveyls_email_register_subj' => 'Surveyls Email Register Subj',
            'surveyls_email_register' => 'Surveyls Email Register',
            'surveyls_email_confirm_subj' => 'Surveyls Email Confirm Subj',
            'surveyls_email_confirm' => 'Surveyls Email Confirm',
            'surveyls_dateformat' => 'Surveyls Dateformat',
            'surveyls_attributecaptions' => 'Surveyls Attributecaptions',
            'email_admin_notification_subj' => 'Email Admin Notification Subj',
            'email_admin_notification' => 'Email Admin Notification',
            'email_admin_responses_subj' => 'Email Admin Responses Subj',
            'email_admin_responses' => 'Email Admin Responses',
            'surveyls_numberformat' => 'Surveyls Numberformat',
            'attachments' => 'Attachments',
        ];
    }

public function getLimeSurveysLanguagesettingsList(){
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
