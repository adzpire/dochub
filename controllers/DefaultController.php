<?php

namespace backend\modules\dochub\controllers;

use Yii;
use yii\web\Controller;
use backend\modules\dochub\models\FormAutoSessionSearch;
use backend\modules\person\models\Person;

use backend\modules\intercom\models\MainIntercom;
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
//        $this->checkperson = Person::findOne([Yii::$app->user->id]);
        $this->moduletitle = Yii::t('app', Yii::$app->controller->module->params['title']);
        return true;
    }
    public function actionIndex()
    {
        Yii::$app->view->title = Yii::t('app', 'ฟอร์มอัตโนมัติ');

        $searchModel = new FormAutoSessionSearch(['created_by' => Yii::$app->user->id]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'ftype' => $searchModel->getItemForm(),
        ]);
    }
    public function actionPosinfo($id)
    {
        $model = Person::find()
            ->where(['user_id' => $id])
            ->one();
        $intmdl = MainIntercom::find()
            ->where(['staff_id' => $id])
            ->one();
        if ($model !== null) {
            $array = array($model->position->name_th, $intmdl->number);
            echo json_encode($array);
            //return [$model->position->name_th, $model->staff->tel];
        } else {
            echo json_encode(['-', '-']);
        }
    }
}
