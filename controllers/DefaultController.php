<?php

namespace backend\modules\dochub\controllers;

use Yii;
use yii\web\Controller;
use backend\modules\dochub\models\FormAutoSessionSearch;
/**
 * Default controller for the `dochub` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public $checkperson;
    public $moduletitle;
    public function beforeAction(){
        //$this->checkperson = Person::findOne([Yii::$app->user->id]);
        $this->moduletitle = Yii::t('app', Yii::$app->controller->module->params['title']);
        return true;
    }
    public function actionIndex()
    {
        Yii::$app->view->title = Yii::t('app', 'ฟอร์มอัตโนมัติ');

        $searchModel = new FormAutoSessionSearch(['created_by' => 19]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
