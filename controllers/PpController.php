<?php

namespace backend\modules\dochub\controllers;

use Yii;
use backend\modules\dochub\models\FormAutoPp;
use backend\modules\dochub\models\FormAutoPpSearch;
use frontend\modules\linenotify\models\Linetoken;
use backend\modules\intercom\models\MainIntercom;
use backend\components\AdzpireComponent;
use backend\modules\mainjob\models\MainJob;

use backend\modules\person\models\Person;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

use yii\filters\VerbFilter;

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

use yii\helpers\ArrayHelper;
use yii\helpers\Url;

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

    public $adminArr = [];
    public $moduletitle;
    public $lineprog;
    public function beforeAction(){
        // admin can see all ex. 19 = abdul-aziz.d
        $this->adminArr = [19];
        $this->moduletitle = Yii::t('app', Yii::$app->controller->module->params['title']);
        $this->lineprog = Yii::$app->controller->module->params['lineprog'];
        return true;
    }
	 
    /**
     * Lists all FormAutoPp models.
     * @return mixed
     */
    public function actionIndex()
    {
		 
		 Yii::$app->view->title = ' รายการ '.FormAutoPp::fn()['name'].' - '.$this->moduletitle;
		 
        $searchModel = new FormAutoPpSearch([
            'pp_stid' => (in_array(Yii::$app->user->id, $this->adminArr)) ? NULL : Yii::$app->user->id
        ]);
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
                // $mdllt = Linetoken::getToken($this->lineprog);
                // if(!empty($mdllt)){
                    AdzpireComponent::linenotify(3, "\n** ------ มีขอ PSU PP ------ **\n อ่านเพิ่มเติม: http://www.comm-sci.pn.psu.ac.th/".Url::to(['view', 'id'=> $model->pp_id]), 19);
                // }
                AdzpireComponent::succalert('addflsh', 'เพิ่มรายการใหม่เรียบร้อย');
			return $this->redirect(['view', 'id' => $model->pp_id]);	
			}else{
				AdzpireComponent::dangalert('addflsh', 'เพิ่มรายการไม่ได้');
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
		 
		 Yii::$app->view->title = Yii::t('app', 'ปรับปรุงรายการ '.$model::fn()['name'].': ', [
    'modelClass' => 'Form Auto Pp',
]) . $model->pp_id.' - '.$this->moduletitle;
		 
        if ($model->load(Yii::$app->request->post())) {
			if($model->save()){
                AdzpireComponent::succalert('edtflsh', 'ปรับปรุงรายการเรียบร้อย');
			return $this->redirect(['view', 'id' => $model->pp_id]);	
			}else{
                AdzpireComponent::dangalert('edtflsh', 'ปรับปรุงรายการไม่ได้');
			}
            return $this->redirect(['view', 'id' => $model->pp_id]);
        }

        $qstaff = Person::getPersonList();
        $jobs = MainJob::getMainJobList();

            return $this->render('update', [
                'model' => $model,
                'staff' => $qstaff,
                'jobs' => $jobs,
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
		
		AdzpireComponent::succalert('delflsh', 'ลบรายการเรียบร้อย');		

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
        $model = ($id == 'example') ?$this->findModel(0) : $this->findModel($id);

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
