<?php

namespace backend\modules\dochub\controllers;

use Yii;
use backend\modules\dochub\models\EnglishtestData;
use backend\modules\dochub\models\EnglishtestDataSearch;
use backend\modules\dochub\models\EnglishtestAttendeeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\modules\location\models\MainLocation;
use backend\components\AdzpireComponent;

use yii\web\Response;
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/**
 * EtdController implements the CRUD actions for EnglishtestData model.
 */
class EtdController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['update', 'delete'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            $model = $this->findModel(Yii::$app->request->get('id'));
                            if ($model->created_by != Yii::$app->user->id) {
                                return false;
                            } else {
                                return true;
                            }
                        }
                    ],
                ],
            ],
        ];
    }

	public $moduletitle;
    public function beforeAction($action){
			$this->moduletitle = 'ระบบฟอร์มลงทะเบียนผ่าน PSU Passport '.Yii::t('app', Yii::$app->controller->module->params['title']);

        return parent::beforeAction($action);
		  /* 
        if(ArrayHelper::isIn(Yii::$app->user->id, Yii::$app->controller->module->params['adminModule'])){
            //echo 'you are passed';
        }else{
            throw new ForbiddenHttpException('You have no right. Must be admin module.');
        }
        */
    }
	 
    /**
     * Lists all EnglishtestData models.
     * @return mixed
     */
    public function actionIndex()
    {
		 
		 Yii::$app->view->title = 'รายการ - '. $this->moduletitle;
		 
        $searchModel = new EnglishtestDataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDetail($id)
    {

        $searchModel = new EnglishtestAttendeeSearch(['ed_id' => $id]);
        Yii::$app->view->title = 'รายการลงชื่อกิจกรรม - '.$searchModel->ed->ed_title;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('detail', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EnglishtestData model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		 $model = $this->findModel($id);
		 
		 Yii::$app->view->title = Yii::t('app', 'ดูรายละเอียด') . ' : ' .$model->ID.' - '. $this->moduletitle;
		 
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new EnglishtestData model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		 Yii::$app->view->title = Yii::t('app', 'สร้างใหม่') .' - '. $this->moduletitle;
		 
        $model = new EnglishtestData();

		/* if enable ajax validate
		if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
			Yii::$app->response->format = Response::FORMAT_JSON;
			return ActiveForm::validate($model);
		}*/
		
        if ($model->load(Yii::$app->request->post())) {
			if($model->save()){
				AdzpireComponent::succalert('addflsh', 'เพิ่มรายการใหม่เรียบร้อย');
				return $this->redirect(['view', 'id' => $model->ID]);	
			}else{
				AdzpireComponent::dangalert('addflsh', 'เพิ่มรายการไม่ได้');
			}
            print_r($model->getErrors());exit();
        }
        $model->ed_confirm = 'เช่น ยืนยันการลงชื่อ/อ่านข้อมูลตามลิ้งค์แนบนี้ <a href="/article/1">คลื้ก</a>';
            return $this->render('create', [
                'model' => $model,
                'locarr' => MainLocation::getAutoCompleteList(),
                'round' => $model::getDistinctround(),
            ]);
        

    }

    /**
     * Updates an existing EnglishtestData model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		 $model = $this->findModel($id);
		 
		 Yii::$app->view->title = 'ปรับปรุงรายการ Englishtest Data: ' . $model->ID.' - '. $this->moduletitle;
		 
        if ($model->load(Yii::$app->request->post())) {
			if($model->save()){
				AdzpireComponent::succalert('edtflsh', 'ปรับปรุงรายการเรียบร้อย');
			return $this->redirect(['view', 'id' => $model->ID]);	
			}else{
				AdzpireComponent::dangalert('edtflsh', 'ปรับปรุงรายการไม่ได้');
			}
            print_r($model->getErrors());exit();
        } 

            return $this->render('update', [
                'model' => $model,
                'locarr' => MainLocation::getAutoCompleteList(),
            ]);
        

    }

    /**
     * Deletes an existing EnglishtestData model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
		
		AdzpireComponent::succalert('edtflsh', 'ลบรายการเรียบร้อย');		

        return $this->redirect(['index']);
    }

    /**
     * Finds the EnglishtestData model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EnglishtestData the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EnglishtestData::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('ไม่พบหน้าที่ต้องการ.');
        }
    }
}
