<?php

namespace backend\modules\dochub\controllers;

use Yii;
use backend\modules\dochub\models\InvtRepairDetail;
use backend\modules\dochub\models\InvtRepairDetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\web\Response;
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/**
 * InvtrpdetController implements the CRUD actions for InvtRepairDetail model.
 */
class InvtrpdetController extends Controller
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
        ];
    }

	public $admincontroller = [20];
	public $moduletitle;
    public function beforeAction(){
        foreach($this->admincontroller as $key){
            array_push(Yii::$app->controller->module->params['adminModule'],$key);
			$this->moduletitle = Yii::t('app', Yii::$app->controller->module->params['title']);
        }

        return true;
		  /* 
        if(ArrayHelper::isIn(Yii::$app->user->id, Yii::$app->controller->module->params['adminModule'])){
            //echo 'you are passed';
        }else{
            throw new ForbiddenHttpException('You have no right. Must be admin module.');
        }
        */
    }
	 
    /**
     * Lists all InvtRepairDetail models.
     * @return mixed
     */
    public function actionIndex()
    {
		 
		 Yii::$app->view->title = 'Invt Repair Details'.' - '. $this->moduletitle;
		 
        $searchModel = new InvtRepairDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InvtRepairDetail model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		 $model = $this->findModel($id);
		 
		 Yii::$app->view->title = Yii::t('app', 'ดูรายละเอียด') . ' : ' .$model->ird_id.' - '. $this->moduletitle;
		 
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new InvtRepairDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		 Yii::$app->view->title = Yii::t('app', 'สร้างใหม่') .' - '. $this->moduletitle;
		 
        $model = new InvtRepairDetail();

		/* if enable ajax validate
		if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
			Yii::$app->response->format = Response::FORMAT_JSON;
			return ActiveForm::validate($model);
		}*/
		
        if ($model->load(Yii::$app->request->post())) {
			if($model->save()){
				Yii::$app->getSession()->setFlash('addflsh', [
				'type' => 'success',
				'duration' => 4000,
				'icon' => 'glyphicon glyphicon-ok-circle',
				'message' => 'เพิ่มรายการใหม่เรียบร้อย',
				]);
			return $this->redirect(['view', 'id' => $model->ird_id]);	
			}else{
				Yii::$app->getSession()->setFlash('addflsh', [
				'type' => 'danger',
				'duration' => 4000,
				'icon' => 'glyphicon glyphicon-remove-circle',
				'message' => 'เพิ่มรายการไม่ได้',
				]);
			}
            print_r($model->getErrors());
            exit;
        }

            return $this->render('create', [
                'model' => $model,
            ]);
        

    }

    /**
     * Updates an existing InvtRepairDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		 $model = $this->findModel($id);
		 
		 Yii::$app->view->title = 'ปรับปรุงรายการ Invt Repair Detail: ' . $model->ird_id.' - '. $this->moduletitle;
		 
        if ($model->load(Yii::$app->request->post())) {
			if($model->save()){
				Yii::$app->getSession()->setFlash('edtflsh', [
				'type' => 'success',
				'duration' => 4000,
				'icon' => 'glyphicon glyphicon-ok-circle',
				'message' => 'ปรับปรุงรายการเรียบร้อย',
				]);
			return $this->redirect(['view', 'id' => $model->ird_id]);	
			}else{
				Yii::$app->getSession()->setFlash('edtflsh', [
				'type' => 'danger',
				'duration' => 4000,
				'icon' => 'glyphicon glyphicon-remove-circle',
				'message' => 'ปรับปรุงรายการไม่ได้',
				]);
			}
            print_r($model->getErrors());
            exit;
        } 

            return $this->render('update', [
                'model' => $model,
            ]);
        

    }

    /**
     * Deletes an existing InvtRepairDetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
		
		Yii::$app->getSession()->setFlash('edtflsh', [
			'type' => 'success',
			'duration' => 4000,
			'icon' => 'glyphicon glyphicon-ok-circle',
			'message' => 'ลบรายการเรียบร้อย',
		]);
		

        return $this->redirect(['index']);
    }

    /**
     * Finds the InvtRepairDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InvtRepairDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InvtRepairDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('ไม่พบหน้าที่ต้องการ.');
        }
    }
}
