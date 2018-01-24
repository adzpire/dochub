<?php

namespace backend\modules\dochub\controllers;

use Yii;
use backend\modules\dochub\models\FormAutoMf;
use backend\modules\dochub\models\FormAutoMfSearch;

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
use yii\helpers\Json;

use kartik\mpdf\Pdf;

/**
 * MedicfeeController implements the CRUD actions for FormAutoMf model.
 */
class MedicfeeController extends Controller
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
        //$this->checkperson = Person::findOne([Yii::$app->user->id]);
        $this->moduletitle = Yii::t('app', Yii::$app->controller->module->params['title']);
        return parent::beforeAction($action);
    }
    /**
     * Lists all FormAutoMf models.
     * @return mixed
     */
    public function actionIndex()
    {
        Yii::$app->view->title = ' รายการ '.FormAutoMf::fn()['name']. ' - '.$this->moduletitle;

        $searchModel = new FormAutoMfSearch(['mf_stid' => Yii::$app->user->id]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FormAutoMf model.
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
     * Creates a new FormAutoMf model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        Yii::$app->view->title = Yii::t('app', 'สร้างใหม่').' - '.$this->moduletitle;

        $model = new FormAutoMf();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        $model->mf_lackfor = 0;
        $model->mf_lackright = 0;
        $model->mf_lackamount = 0;
        $model->mf_fiftyfor = 0;
        $model->mf_fiftyamount = 0;
        $model->mf_hosbdate = date('Y-m-d');
        $model->mf_hosedate = date('Y-m-d');
        if ($model->load(Yii::$app->request->post())) {
            $model->mf_date = date('Y-m-d');
            //$model->ce_sum = $model->ce_whole + $model->ce_piece + $model->ce_half;
            if($model->save()){
                AdzpireComponent::succalert('addflsh', 'เพิ่มรายการใหม่เรียบร้อย');
                return $this->redirect(['update', 'id' => $model->fid]);
            }else{
                AdzpireComponent::dangalert('addflsh', 'เพิ่มรายการไม่ได้');
            }
            print_r($model->getErrors());exit;
        } else {
            $qstaff = Person::getPersonList();
            return $this->render('create', [
                'model' => $model,
                'staff' => $qstaff,
                'chstat' => $model->getItemChildstat(),
                'birthright' => $model->getItemBirthright(),
                'hosptype' => $model->getItemHosptype(),
                'feeright' => $model->getItemFeeright(),
                'lackright' => $model->getItemLackright(),
                'lackfor' => $model->getItemLackfor(),
                'fiftyfor' => $model->getItemfiftyfor(),
                'usedto' => $model->getItemUsedto(),
            ]);
        }
    }

    /**
     * Updates an existing FormAutoMf model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        Yii::$app->view->title = Yii::t('app', 'ปรับปรุงรายการ '.$model::fn()['name'].': ', [
                'modelClass' => 'Update Form Auto Mf',
            ]) . $model->fid.' - '.$this->moduletitle;

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                AdzpireComponent::succalert('edtflsh', 'ปรับปรุงรายการเรียบร้อย');
                return $this->redirect(['update', 'id' => $model->fid]);
            }else{
                AdzpireComponent::dangalert('edtflsh', 'ปรับปรุงรายการไม่ได้');
            }
            print_r($model->getErrors());exit;
        } else {

            $qstaff = Person::getPersonList();
            return $this->render('update', [
                'model' => $model,
                'staff' => $qstaff,
                'chstat' => $model->getItemChildstat(),
                'birthright' => $model->getItemBirthright(),
                'hosptype' => $model->getItemHosptype(),
                'feeright' => $model->getItemFeeright(),
                'lackright' => $model->getItemLackright(),
                'lackfor' => $model->getItemLackfor(),
                'fiftyfor' => $model->getItemfiftyfor(),
                'usedto' => $model->getItemUsedto(),
            ]);
        }
    }

    /**
     * Deletes an existing FormAutoMf model.
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
     * Finds the FormAutoMf model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FormAutoMf the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FormAutoMf::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionPdf($id)
    {
        $model = ($id == 'example') ?$this->findModel(0) : $this->findModel($id);

        $intmdl = MainIntercom::find()
            ->where(['staff_id' => $model->mf_stid])
            ->one();
        $thaibathtext = AdzpireComponent::thaibath($model->mf_want);
//        return $this->renderPartial('print', [
//            'model' => $model,
//            'intmdl' => $intmdl,
//            'details' => $details,
//            'thaibathtext' => $thaibathtext,
//        ]);
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
                'title' => 'แบบขออนุมัติจัดซื้อครุภัณฑ์นอกแผนการจัดซื้อประจําปี',
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
}
