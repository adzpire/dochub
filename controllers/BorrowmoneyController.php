<?php

namespace backend\modules\dochub\controllers;

use Yii;
use backend\modules\dochub\models\FormAutoBrmn;
use backend\modules\dochub\models\FormAutoBrmnSearch;

use backend\modules\person\models\Person;

use backend\modules\intercom\models\MainIntercom;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

use yii\filters\VerbFilter;

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

use yii\helpers\ArrayHelper;

/**
 * BorrowmoneyController implements the CRUD actions for FormAutoBrmn model.
 */
class BorrowmoneyController extends Controller
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

	 public $checkperson;
    public $moduletitle;
    public function beforeAction(){
       //$this->checkperson = Person::findOne([Yii::$app->user->id]);
       $this->moduletitle = Yii::t('app', Yii::$app->controller->module->params['title']);
       return true;
    }
	 
    /**
     * Lists all FormAutoBrmn models.
     * @return mixed
     */
    public function actionIndex()
    {
		 
		 Yii::$app->view->title = Yii::t('app', 'Form Auto Brmns').' - '.$this->moduletitle;
		 
        $searchModel = new FormAutoBrmnSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FormAutoBrmn model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		 $model = $this->findModel($id);
		 
		 Yii::$app->view->title = Yii::t('app', 'ดูรายละเอียด').' : '.$model->brmn_id.' - '.$this->moduletitle;
		 
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new FormAutoBrmn model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		 Yii::$app->view->title = Yii::t('app', 'สร้างใหม่').' - '.$this->moduletitle;
		 
        $model = new FormAutoBrmn();

		/* if enable ajax validate*/
		if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
			Yii::$app->response->format = Response::FORMAT_JSON;
			return ActiveForm::validate($model);
		}
		
        if ($model->load(Yii::$app->request->post())) {
			if($model->save()){
				Yii::$app->getSession()->setFlash('addflsh', [
				'type' => 'success',
				'duration' => 4000,
				'icon' => 'glyphicon glyphicon-ok-circle',
				'message' => Yii::t('app', 'เพิ่มรายการใหม่เรียบร้อย'),
				]);
			return $this->redirect(['view', 'id' => $model->brmn_id]);	
			}else{
				Yii::$app->getSession()->setFlash('addflsh', [
				'type' => 'danger',
				'duration' => 4000,
				'icon' => 'glyphicon glyphicon-remove-circle',
				'message' => Yii::t('app', 'เพิ่มรายการไม่ได้'),
				]);
			}
            print_r($model->getErrors());exit;
        }

        $qstaff = Person::getPersonList();

            return $this->render('create', [
                'model' => $model,
                'staff' => $qstaff,
                'choicearr' => FormAutoBrmn::CHOICE_ARR,
            ]);
        

    }

    /**
     * Updates an existing FormAutoBrmn model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		 $model = $this->findModel($id);
		 
		 Yii::$app->view->title = Yii::t('app', 'ปรับปรุงรายการ '). FormAutoBrmn::MODEL_NAME .' หมายเลข: '. $model->brmn_id.' - '.$this->moduletitle;

        /* if enable ajax validate*/
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {
			if($model->save()){
				Yii::$app->getSession()->setFlash('edtflsh', [
				'type' => 'success',
				'duration' => 4000,
				'icon' => 'glyphicon glyphicon-ok-circle',
				'message' => Yii::t('app', 'ปรับปรุงรายการเรียบร้อย'),
				]);
			return $this->redirect(['view', 'id' => $model->brmn_id]);	
			}else{
				Yii::$app->getSession()->setFlash('edtflsh', [
				'type' => 'danger',
				'duration' => 4000,
				'icon' => 'glyphicon glyphicon-remove-circle',
				'message' => Yii::t('app', 'ปรับปรุงรายการไม่ได้'),
				]);
			}
            return $this->redirect(['view', 'id' => $model->brmn_id]);
        }

        $qstaff = Person::getPersonList();

        $intmdl = MainIntercom::find()
            ->where(['staff_id' => $model->brmn_stid])
            ->one();

            return $this->render('update', [
                'model' => $model,
                'staff' => $qstaff,
                'intmdl' => $intmdl,
                'choicearr' => FormAutoBrmn::CHOICE_ARR,
            ]);
        

    }

    /**
     * Deletes an existing FormAutoBrmn model.
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
			'message' => Yii::t('app', 'ลบรายการเรียบร้อย'),
		]);
		

        return $this->redirect(['index']);
    }
    public function actionPrint($id)
    {
        $model = $this->findModel($id);

        $intmdl = MainIntercom::find()
            ->where(['staff_id' => $model->brmn_stid])
            ->one();

        return $this->renderPartial('print', [
            'model' => $model,
            'intmdl' => $intmdl,
        ]);
    }

    /**
     * Finds the FormAutoBrmn model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FormAutoBrmn the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FormAutoBrmn::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('ไม่พบหน้าที่ต้องการ.');
        }
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
        }else{
            echo json_encode(['-','-']);
        }
    }
}
