<?php

namespace backend\modules\dochub\controllers;

use Yii;
use backend\modules\dochub\models\EnglishtestAttendee;
use backend\modules\dochub\models\EnglishtestAttendeeSearch;
use backend\modules\dochub\models\EdaActivelistSearch;
use backend\modules\dochub\models\EnglishtestData;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\components\AdzpireComponent;

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/**
 * EtaController implements the CRUD actions for EnglishtestAttendee model.
 */
class EtaController extends Controller
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
                'only' => ['enrol', 'deleteenrol'],
                'rules' => [
                    [
                        'actions' => ['enrol'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            $model = $this->findDataModel(Yii::$app->request->get('id'));
//                            print_r($model->attendee);exit();
                            if (!empty($model->attendee) OR !$model->remainseat[0] /*OR ($model->getCheckround($model->ed_round) and $model->ID != $model->getCheckround($model->ed_round))*/) {
                                return false;
                            } else {
                                return true;
                            }
                        }
                    ],
                    [
                        'actions' => ['deleteenrol'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            $model = $this->findModel(Yii::$app->request->get('id'));
                            if ($model->username != $_SESSION['ldapData']['accountname']) {
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
     * Lists all EnglishtestAttendee models.
     * @return mixed
     */
    public function actionIndex()
    {
		 
		 Yii::$app->view->title = 'รายการ - '. $this->moduletitle;
		 
        $searchModel = new EnglishtestAttendeeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EnglishtestAttendee model.
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
     * Creates a new EnglishtestAttendee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		 Yii::$app->view->title = Yii::t('app', 'สร้างใหม่') .' - '. $this->moduletitle;
		 
        $model = new EnglishtestAttendee();

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

            return $this->render('create', [
                'model' => $model,
            ]);
        

    }

    /**
     * Updates an existing EnglishtestAttendee model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		 $model = $this->findModel($id);
		 
		 Yii::$app->view->title = 'ปรับปรุงรายการ Englishtest Attendee: ' . $model->ID.' - '. $this->moduletitle;
		 
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
            ]);
        

    }

    /**
     * Deletes an existing EnglishtestAttendee model.
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
    public function actionDeleteenrol($id)
    {
        $this->findModel($id)->delete();

        AdzpireComponent::succalert('edtflsh', 'ลบรายการเรียบร้อย');

        return $this->redirect(['activelist']);
    }
    /**
     * Finds the EnglishtestAttendee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EnglishtestAttendee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EnglishtestAttendee::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('ไม่พบหน้าที่ต้องการ.');
        }
    }

    protected function findDataModel($id)
    {
        if (($model = EnglishtestData::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('ไม่พบหน้าที่ต้องการ.');
        }
    }
    public function actionActivelist()
    {

        Yii::$app->view->title = 'รายการสมัคร/ลงทะเบียนกิจกรรมที่เปิดรับ';
        Yii::$app->controller->module->layout = null;
        $searchModel = new EdaActivelistSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('activelist', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionEnrol($id)
    {
        $datamdl = $this->findDataModel($id);

        Yii::$app->view->title = Yii::t('app', 'ลงชื่อ/สมัครกิจกรรม');
        Yii::$app->controller->module->layout = null;
        $model = new EnglishtestAttendee();

        /* if enable ajax validate
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }*/

        if ($model->load(Yii::$app->request->post())) {
            $thname = explode(" ", $_SESSION['ldapData']['description']);
            $model->ed_id = $id;
            $model->ea_date = $datamdl->ed_active_till;
            $model->firstname_th = $thname[0];
            $model->lastname_th = $thname[1];
            $model->firstname_eng = $_SESSION['ldapData']['firstname'];
            $model->lastname_eng = $_SESSION['ldapData']['lastname'];
            $model->username =$_SESSION['ldapData']['accountname'];
            if($model->save()){
                AdzpireComponent::succalert('addflsh', 'สมัครเรียบร้อย');
                return $this->redirect('activelist');
            }else{
                AdzpireComponent::dangalert('addflsh', 'สมัครไม่ได้');
            }
            print_r($model->getErrors());exit();
        }

        return $this->render('enrol', [
            'model' => $model,
            'datamdl' => $datamdl,
        ]);
    }
}
