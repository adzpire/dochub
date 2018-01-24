<?php

namespace backend\modules\dochub\controllers;

use Yii;
use backend\modules\dochub\models\FormAutoHirbdgt;
use backend\modules\dochub\models\FormAutoHirbdgtSearch;
use backend\modules\dochub\models\FormAutoHirbdgtdetail;
use backend\modules\dochub\models\FormAutoHirbdgtdetailSearch;

use backend\modules\person\models\Person;

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
 * HirebudgetController implements the CRUD actions for FormAutoHirbdgt model.
 */
class HirebudgetController extends Controller
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
        //$this->checkperson = Person::findOne([Yii::$app->user->hbdgt_id]);
        $this->moduletitle = Yii::t('app', Yii::$app->controller->module->params['title']);
        return parent::beforeAction($action);
    }

    /**
     * Lists all FormAutoHirbdgt models.
     * @return mixed
     */
    public function actionIndex()
    {
        Yii::$app->view->title = ' รายการ '.FormAutoHirbdgt::fn()['name']. ' - '.$this->moduletitle;
        $searchModel = new FormAutoHirbdgtSearch(['hbdgt_stid' => Yii::$app->user->id]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FormAutoHirbdgt model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new FormAutoHirbdgt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        Yii::$app->view->title = Yii::t('app', 'สร้างใหม่').' - '.$this->moduletitle;

        $model = new FormAutoHirbdgt();

        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                AdzpireComponent::succalert('addflsh', 'เพิ่มรายการใหม่เรียบร้อย');
                return $this->redirect(['update', 'id' => $model->hbdgt_id]);
            }else{
                AdzpireComponent::dangalert('addflsh', 'เพิ่มรายการไม่ได้');
            }
            print_r($model->getErrors());exit;
        } else {

            $qstaff = Person::getPersonList();

            return $this->render('create', [
                'model' => $model,
                'staff' => $qstaff,
            ]);
        }
    }

    /**
     * Updates an existing FormAutoHirbdgt model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        Yii::$app->view->title = Yii::t('app', 'ปรับปรุงรายการ '.$model::fn()['name'].': ', [
                'modelClass' => 'Form Auto Unplnbdgt',
            ]) . $model->hbdgt_id.' - '.$this->moduletitle;

        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                AdzpireComponent::succalert('edtflsh', 'ปรับปรุงรายการเรียบร้อย');
                return $this->redirect(['update', 'id' => $model->hbdgt_id]);
            }else{
                AdzpireComponent::dangalert('edtflsh', 'ปรับปรุงรายการไม่ได้');
            }
            print_r($model->getErrors());exit;
        }else {

            $qstaff = Person::getPersonList();
            $intmdl = MainIntercom::find()
                ->where(['staff_id' => $model->hbdgt_stid])
                ->one();
            $searchModel = new FormAutoHirbdgtdetailSearch(['hbdgtdet_hbid' => $model->hbdgt_id]);
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->sort = false;

            return $this->render('update', [
                'model' => $model,
                'staff' => $qstaff,
                'intmdl' => $intmdl,
                //'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Deletes an existing FormAutoHirbdgt model.
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

    public function actionQadddetail($id)
    {
        $model = new FormAutoHirbdgtdetail();

        if ($model->load(Yii::$app->request->post())) {

            $model->hbdgtdet_hbid = $id;
            $model->hbdgtdet_price = $model->hbdgtdet_amount * $model->hbdgtdet_xpecprice;

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

    public function actionUpdatedetail($id)
    {
        $model = $this->findModeldetail($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->hbdgtdet_price = $model->hbdgtdet_amount * $model->hbdgtdet_xpecprice;

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

    public function actionUpdatetax($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'updatetax';
        if (isset(Yii::$app->request->post()['FormAutoHirbdgt']['hbdgt_tax'])) {
            $model->hbdgt_tax = Yii::$app->request->post()['FormAutoHirbdgt']['hbdgt_tax'];
            if($model->save()){
                echo 'updated';
            }else{
                echo 'failed';
            }
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
    /**
     * Finds the FormAutoHirbdgt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FormAutoHirbdgt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FormAutoHirbdgt::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModeldetail($id)
    {
        if (($model = FormAutoHirbdgtdetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('ไม่พบหน้าที่ต้องการ.');
        }
    }

    public function actionPdf($id)
    {
        $model = ($id == 'example') ?$this->findModel(0) : $this->findModel($id);

        $intmdl = MainIntercom::find()
            ->where(['staff_id' => $model->hbdgt_stid])
            ->one();
        if(!empty($model->formAutoHirbdgtdetails)) {
            $details = FormAutoHirbdgtdetail::findAll([
                'hbdgtdet_hbid' => $model->hbdgt_id,
            ]);
        }else{
            return $this->redirect(['update', 'id' => $model->hbdgt_id]);
        }
        $sumdetails = FormAutoHirbdgtdetail::find()->where(['hbdgtdet_hbid' => $model->hbdgt_id])->sum('hbdgtdet_price');
        $sumdetails = ($model->hbdgt_tax == 1) ? $sumdetails*1.07 : $sumdetails;
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