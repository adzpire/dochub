<?php

namespace backend\modules\dochub\controllers;

use Yii;
use backend\modules\dochub\models\FormAutoPp;
use backend\modules\dochub\models\FormAutoPpSearch;

use backend\modules\intercom\models\MainIntercom;

use backend\modules\mainjob\models\MainJob;

use backend\modules\person\models\Person;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

use yii\filters\VerbFilter;

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

use yii\helpers\ArrayHelper;

use kartik\mpdf\Pdf;
/**
 * PpController implements the CRUD actions for FormAutoPp model.
 */
class PpController extends Controller
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
     * Lists all FormAutoPp models.
     * @return mixed
     */
    public function actionIndex()
    {
		 
		 Yii::$app->view->title = ' รายการ '.Yii::t('app', FormAutoPp::MODEL_NAME).' - '.$this->moduletitle;
		 
        $searchModel = new FormAutoPpSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FormAutoPp model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		 $model = $this->findModel($id);
		 
		 Yii::$app->view->title = Yii::t('app', 'ดูรายละเอียด').' : '.$model->pp_id.' - '.$this->moduletitle;
		 
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new FormAutoPp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		 Yii::$app->view->title = Yii::t('app', 'สร้างใหม่').' - '.$this->moduletitle;
		 
        $model = new FormAutoPp();

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
				'message' => Yii::t('app', 'เพิ่มรายการใหม่เรียบร้อย'),
				]);
			return $this->redirect(['view', 'id' => $model->pp_id]);	
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
        $jobs = MainJob::getMainJobList();
        return $this->render('create', [
            'model' => $model,
            'staff' => $qstaff,
            'jobs' => $jobs,
            ]);
        

    }

    /**
     * Updates an existing FormAutoPp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		 $model = $this->findModel($id);
		 
		 Yii::$app->view->title = Yii::t('app', 'ปรับปรุงรายการ {modelClass}: ', [
    'modelClass' => 'Form Auto Pp',
]) . $model->pp_id.' - '.$this->moduletitle;
		 
        if ($model->load(Yii::$app->request->post())) {
			if($model->save()){
				Yii::$app->getSession()->setFlash('edtflsh', [
				'type' => 'success',
				'duration' => 4000,
				'icon' => 'glyphicon glyphicon-ok-circle',
				'message' => Yii::t('app', 'ปรับปรุงรายการเรียบร้อย'),
				]);
			return $this->redirect(['view', 'id' => $model->pp_id]);	
			}else{
				Yii::$app->getSession()->setFlash('edtflsh', [
				'type' => 'danger',
				'duration' => 4000,
				'icon' => 'glyphicon glyphicon-remove-circle',
				'message' => Yii::t('app', 'ปรับปรุงรายการไม่ได้'),
				]);
			}
            return $this->redirect(['view', 'id' => $model->pp_id]);
        } 

            return $this->render('update', [
                'model' => $model,
            ]);
        

    }

    /**
     * Deletes an existing FormAutoPp model.
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

    /**
     * Finds the FormAutoPp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FormAutoPp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FormAutoPp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('ไม่พบหน้าที่ต้องการ.');
        }
    }

    public function actionPdf($id)
    {
        $model = $this->findModel($id);
        $intmdl = MainIntercom::find()
            ->where(['staff_id' => $model->pp_stid])
            ->one();

        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'content' => $this->renderPartial('print', [
                'model' => $model,
                'intmdl' => $intmdl,
            ]),
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'options' => [
                'title' => 'แบบฟอร์มขออนุมัติยืมเงินรายได้มหาวิทยาลัย',
                'subject' => 'Generating PDF files via yii2-mpdf extension has never been easy'
            ],
            'cssInline' => '
                body {
                    margin-top: 10px;
                    margin-bottom: 10px;
                    font-size: 20px;
                    line-height: 22px;
                    font-family: "sarabun";
                }
                .pagebreak { page-break-before: always; }
                .tbhead {
                    border-top-style: none;
                    border-right-style: none;
                    border-bottom-style: none;
                    border-left-style: none;
                }
                .tbhead {
                    border-top-style: none;
                    border-right-style: none;
                    border-bottom-style: none;
                    border-left-style: none;
                }
                .tbcontent {
                    border: thin solid #000;
                    vertical-align: top;
                    padding-left: 5px;
                }
                a {
                    display: inline-block;
                    color: #000;
                    line-height: 18px;
                    text-decoration: none;
                    border-bottom: 1px dotted;
                }
                .style6{
                  font-size: 30px;
                }
                .style5{
                  font-size: 25px;
                }
                .style4{
                  font-size: 20px;
                }
                .fixpos {
                    position: absolute;
                    right: 300px;
                }
                @media print {
                    .noprint {
                        display: none;
                    }
                }
            ',
            'methods' => [
                //'SetHeader' => ['Generated By: Krajee Pdf Component||Generated On: ' . date("r")],
                //'SetFooter' => ['|Page {PAGENO}|'],
            ]
        ]);
        return $pdf->render();
    }
}
