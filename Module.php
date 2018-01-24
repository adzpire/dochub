<?php

namespace backend\modules\dochub;

use Yii;
/**
 * dochub module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\modules\dochub\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {

		Yii::$app->formatter->locale = 'th_TH';
		Yii::$app->formatter->calendar = \IntlDateFormatter::TRADITIONAL;
        Yii::$app->formatter->nullDisplay = '-';
		/*
		 if (!isset(Yii::$app->i18n->translations['repair'])) {
            Yii::$app->i18n->translations['repair'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en',
                'basePath' => 'backend\modules\dochub/dochub/messages'
            ];
        }
		*/
		parent::init();

		$this->layout = 'dochub';
		$this->params['ModuleVers'] = '2.1';
        $this->params['modulecookies'] = 'dochubck';
		$this->params['title'] = 'ระบบสร้างแบบฟอร์มออนไลน์';
        // custom initialization code goes here
    }
}
