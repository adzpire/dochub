<?php

namespace backend\modules\dochub\controllers;

use Yii;
use backend\modules\dochub\models\FormAutoRc;
use backend\modules\dochub\models\FormAutoRcSearch;
use backend\modules\dochub\models\FormAutoRcdetail;
use backend\modules\dochub\models\FormAutoRcdetailSearch;

use backend\modules\person\models\Person;

use backend\modules\thailocale\models\PersonAddress;
use backend\modules\thailocale\models\LocaleProvince;
use backend\modules\thailocale\models\LocaleAmphur;
use backend\modules\thailocale\models\LocaleDistrict;

use backend\modules\intercom\models\MainIntercom;

use backend\components\AdzpireComponent;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

use yii\filters\VerbFilter;

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

use yii\helpers\ArrayHelper;

use kartik\mpdf\Pdf;

/**
 * RecieptController implements the CRUD actions for FormAutoRc model.
 */
class ReceiptController extends Controller
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
     * Lists all FormAutoRc models.
     * @return mixed
     */
    public function actionIndex()
    {

        Yii::$app->view->title = ' รายการ '.FormAutoRc::fn()['name']. ' - ' . $this->moduletitle;

        $searchModel = new FormAutoRcSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FormAutoRc model.
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
     * Creates a new FormAutoRc model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		 Yii::$app->view->title = Yii::t('app', 'สร้างใหม่') .' - '.$this->moduletitle;
		 
        $model = new FormAutoRc();

		/* if enable ajax validate
		if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
			Yii::$app->response->format = Response::FORMAT_JSON;
			return ActiveForm::validate($model);
		}*/
		
        if ($model->load(Yii::$app->request->post())) {
            if(Yii::$app->request->post()['FormAutoRc']['rc_paid'] == ''){$model->rc_paid =  NULL;}

			if($model->save()){
                AdzpireComponent::succalert('addflsh', 'เพิ่มรายการใหม่เรียบร้อย');
			return $this->redirect(['update', 'id' => $model->fid]);
			}else{
                AdzpireComponent::dangalert('addflsh', 'เพิ่มรายการไม่ได้');
			}
            print_r($model->getErrors());
            exit;
        }
            $person = Person::findOne(Yii::$app->user->id);

            $qaddr = PersonAddress::getPersonAddressList(Yii::$app->user->id);

            $qaddr = array( '' => 'ไม่ต้องกรอกชื่อ-ที่อยู่') + $qaddr;

            $intmdl = MainIntercom::find()
                ->where(['staff_id' => Yii::$app->user->id])
                ->one();
            $model->rc_paid = '';
            return $this->render('create', [
                'model' => $model,
                'staff' => $person,
                'addr' => $qaddr,
                'intmdl' => $intmdl,
            ]);
        

    }

    /**
     * Updates an existing FormAutoRc model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		 $model = $this->findModel($id);
        //echo $model->rc_paid;exit;
		 Yii::$app->view->title = 'ปรับปรุงรายการ '.$model::fn()['name'].': ' . $model->fid.' - '.Yii::t('app', Yii::$app->controller->module->params['title']);
		 
        if ($model->load(Yii::$app->request->post())) {
            if(Yii::$app->request->post()['FormAutoRc']['rc_paid'] == ''){$model->rc_paid =  NULL;}

			if($model->save()){
                AdzpireComponent::succalert('edtflsh', 'ปรับปรุงรายการเรียบร้อย');
			return $this->redirect(['update', 'id' => $model->fid]);
			}else{
                AdzpireComponent::dangalert('edtflsh', 'ปรับปรุงรายการไม่ได้');
			}
            print_r($model->getErrors());
            exit;
        }

            $person = Person::findOne(Yii::$app->user->id);

            $qaddr = PersonAddress::getPersonAddressList(Yii::$app->user->id);
            $qaddr = array( '' => 'ไม่ต้องกรอกชื่อ-ที่อยู่') + $qaddr;

            $intmdl = MainIntercom::find()
                ->where(['staff_id' => Yii::$app->user->id])
                ->one();
            $searchModel = new FormAutoRcdetailSearch(['rcd_rcid' => $model->fid]);
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->sort = false;

            return $this->render('update', [
                'model' => $model,
                'staff' => $person,
                'addr' => $qaddr,
                'intmdl' => $intmdl,
                'dataProvider' => $dataProvider,
            ]);
        

    }

    /**
     * Deletes an existing FormAutoRc model.
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
     * Finds the FormAutoRc model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FormAutoRc the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FormAutoRc::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('ไม่พบหน้าที่ต้องการ.');
        }
    }

    protected function findModeldetail($id)
    {
        if (($model = FormAutoRcdetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('ไม่พบหน้าที่ต้องการ.');
        }
    }
    public function actionQaddbelongto()
    {
        $model = new PersonAddress();
        $model->pa_stid = Yii::$app->user->id;
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                echo 1;
            } else {
                echo 0;
            }

        } else {
            return $this->renderAjax('_formbel', [
                'model' => $model,
                'province' => LocaleProvince::getProvinceList(),
                'amphur' => LocaleAmphur::getAmphurList(),
                'district' => LocaleDistrict::getDistrictList(),
            ]);
        }
    }

    public function actionQadddetail($id)
    {
        $model = new FormAutoRcdetail();

        if ($model->load(Yii::$app->request->post())) {

            $model->rcd_rcid = $id;
            //$model->hbdgtdet_price = $model->hbdgtdet_amount * $model->hbdgtdet_xpecprice;

            if ($model->save()) {
                echo 1;
            } else {
                echo 0;
            }

        } else {
            $model->rcd_detail = 'ค่าปฏิบัติงานนอกเวลา';
            $model->rcd_amount = 420;
            return $this->renderAjax('_formdetail', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdatedetail($id)
    {
        $model = $this->findModeldetail($id);

        if ($model->load(Yii::$app->request->post())) {

            //$model->hbdgtdet_price = $model->hbdgtdet_amount * $model->hbdgtdet_xpecprice;

            if ($model->save()) {
                echo 1;
            } else {
                echo 0;
            }

        } else {
            return $this->renderAjax('_formdetail', [
                'model' => $model,
            ]);
        }
    }

    public function actionDeletedetail($id)
    {
        if ($this->findModeldetail($id)->delete()) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function actionPdf($id)
    {
        $model = ($id == 'example') ?$this->findModel(0) : $this->findModel($id);

        $intmdl = MainIntercom::find()
            ->where(['staff_id' => $model->rc_stid])
            ->one();
        if(!empty($model->formAutoRcdetails)) {
            $details = FormAutoRcdetail::findAll([
                'rcd_rcid' => $model->fid,
            ]);
        }else{
            return $this->redirect(['update', 'id' => $model->fid]);
        }
        $sumdetails = FormAutoRcdetail::find()->where(['rcd_rcid' => $model->fid])->sum('rcd_amount');
        //$sumdetails = ($model->hbdgt_tax == 1) ? $sumdetails*1.07 : $sumdetails;
        $thaibathtext = AdzpireComponent::thaibath($sumdetails);
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'content' => $this->renderPartial('print', [
                'model' => $model,
                'intmdl' => $intmdl,
                'details' => $details,
                'thaibathtext' => $thaibathtext,
            ]),
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'options' => [
                'title' => 'แบบขออนุมัติจัดจ้าง',
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
                u {    
                    border-bottom: 1px dotted #000;
                    text-decoration: none;
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

    public function actionCopy($id)
    {
        $orimodel = $this->findModel($id);
        $model = new FormAutoRc();
        $model->rc_paid = $orimodel->rc_paid;
        $model->rc_getfrom = $orimodel->rc_getfrom;
        $model->rc_date = $orimodel->rc_date;
        if($model->save()){
            AdzpireComponent::succalert('addflsh', 'คัดลอกรายการเรียบร้อย');
            return $this->redirect(['update', 'id' => $model->fid]);
        }else{
            AdzpireComponent::dangalert('addflsh', 'คัดลอกรายการไม่ได้');
        }
    }
}
