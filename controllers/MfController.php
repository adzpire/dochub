<?php

namespace backend\modules\dochub\controllers;

use Yii;
use backend\modules\dochub\models\FormMf2016;
use backend\modules\dochub\models\FormMf2016Search;

use backend\modules\person\models\Person;
use backend\modules\intercom\models\MainIntercom;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use backend\components\AdzpireComponent;

use yii\web\Response;
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

use kartik\mpdf\Pdf;

/**
 * MfController implements the CRUD actions for FormMf2016 model.
 */
class MfController extends Controller
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
			/* 'access' => [
                'class' => AccessControl::className(),
                'only' => ['enrol', 'deleteenrol'],
                'rules' => [
                    [
                        'actions' => ['enrol'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            $model = $this->findDataModel(Yii::$app->request->get('id'));
                            if (!empty($model->attendee) OR !$model->remainseat[0]) {
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
            ], */
        ];
    }

	public $moduletitle;
    public function beforeAction($action){
			$this->moduletitle = Yii::t('app', Yii::$app->controller->module->params['title']);

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
     * Lists all FormMf2016 models.
     * @return mixed
     */
    public function actionIndex()
    {
		 
		 Yii::$app->view->title = 'รายการ '.FormMf2016::fn()['name'].' - '. $this->moduletitle;
		 
        $searchModel = new FormMf2016Search(['mf_stid' => Yii::$app->user->id]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FormMf2016 model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		 $model = $this->findModel($id);
		 
		 Yii::$app->view->title = Yii::t('app', 'ดูรายละเอียด') . ' : ' .$model->fid.' - '. $this->moduletitle;
		 
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new FormMf2016 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		 Yii::$app->view->title = Yii::t('app', 'สร้างใหม่') .' - '. $this->moduletitle;
		 
        $model = new FormMf2016();

		/* if enable ajax validate
		if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
			Yii::$app->response->format = Response::FORMAT_JSON;
			return ActiveForm::validate($model);
		}*/
		
        if ($model->load(Yii::$app->request->post())) {
			if($model->save()){
				AdzpireComponent::succalert('addflsh', 'เพิ่มรายการใหม่เรียบร้อย');
				return $this->redirect(['update', 'id' => $model->fid]);
			}else{
				AdzpireComponent::dangalert('addflsh', 'เพิ่มรายการไม่ได้');
			}
            print_r($model->getErrors());exit();
        }

            return $this->render('create', [
                'model' => $model,
                'staff' => Person::getPersonList(),
                'choice' => $model->choice,
            ]);
        

    }

    /**
     * Updates an existing FormMf2016 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		 $model = $this->findModel($id);
		 
		 Yii::$app->view->title = 'ปรับปรุงรายการ '.$model::fn()['name'].': ' . $model->fid.' - '. $this->moduletitle;

        $intmdl = MainIntercom::find()->where(['staff_id' => $model->mf_stid])->one();

        if ($model->load(Yii::$app->request->post())) {
			if($model->save()){
				AdzpireComponent::succalert('edtflsh', 'ปรับปรุงรายการเรียบร้อย');
			return $this->redirect(['update', 'id' => $model->fid]);
			}else{
				AdzpireComponent::dangalert('edtflsh', 'ปรับปรุงรายการไม่ได้');
			}
            print_r($model->getErrors());exit();
        } 

            return $this->render('update', [
                'model' => $model,
                'staff' => Person::getPersonList(),
                'choice' => $model->choice,
                'intmdl' => $intmdl,
            ]);
        

    }

    /**
     * Deletes an existing FormMf2016 model.
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
     * Finds the FormMf2016 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FormMf2016 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FormMf2016::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('ไม่พบหน้าที่ต้องการ.');
        }
    }

    public function actionPdf($id)
    {

        $model = ($id == 'example') ? $this->findModel(0) : $this->findModel($id);

        $intmdl = MainIntercom::find()
            ->where(['staff_id' => $model->mf_stid])
            ->one();

        $thaibathtext = AdzpireComponent::thaibath($model->mf_want);
        $pdf = new Pdf([
            //'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'content' => $this->renderPartial('print', [
                'model' => $model,
                'intmdl' => $intmdl,
                'thaibathtext' => $thaibathtext,
            ]),
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            //'defaultFont' => 'win-1252',
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'options' => [
                'title' => 'ใบเบิกเงินสวัสดิการเกี่ยวกับการรักษาพยาบาลพนักงานมหาวิทยาลัย',
                'subject' => 'Generating PDF files via yii2-mpdf extension has never been easy'
            ],
            'cssInline' => '
                body {
                    margin-top: 10px;
                    margin-bottom: 10px;
                    font-size: 23px;
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
                u {    
                    border-bottom: 1px dotted #000;
                    text-decoration: none;
                }
                .style6{
                  font-size: 34px;
                }
                .style5{
                  font-size: 29px;
                }
                .style4{
                  font-size: 23px;
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
