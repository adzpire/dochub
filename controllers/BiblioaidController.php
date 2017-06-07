<?php

namespace backend\modules\dochub\controllers;

use Yii;
use backend\modules\dochub\models\FormAutoLibraid;
use backend\modules\dochub\models\FormAutoLibraidSearch;
use backend\modules\dochub\models\FormAutoLibraidetail;
use backend\modules\dochub\models\FormAutoLibraidetailSearch;

use backend\modules\person\models\Person;

use backend\modules\intercom\models\MainIntercom;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

use yii\filters\VerbFilter;

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

use yii\helpers\ArrayHelper;

use kartik\mpdf\Pdf;

/**
 * BiblioaidController implements the CRUD actions for FormAutoLibraid model.
 */
class BiblioaidController extends Controller
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

    public function beforeAction()
    {
        $this->moduletitle = Yii::t('app', Yii::$app->controller->module->params['title']);
        return true;
    }
    /**
     * Lists all FormAutoLibraid models.
     * @return mixed
     */
    public function actionIndex()
    {
        Yii::$app->view->title = ' รายการ '.FormAutoLibraid::fn()['name']. ' - ' . $this->moduletitle;

        $searchModel = new FormAutoLibraidSearch(['libaid_stid' => Yii::$app->user->id]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FormAutoLibraid model.
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
     * Creates a new FormAutoLibraid model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        Yii::$app->view->title = Yii::t('app', 'สร้างใหม่').' - '.$this->moduletitle;

        $model = new FormAutoLibraid();

        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                Yii::$app->getSession()->setFlash('addflsh', [
                    'type' => 'success',
                    'duration' => 4000,
                    'icon' => 'glyphicon glyphicon-ok-circle',
                    'message' => Yii::t('app', 'เพิ่มรายการใหม่เรียบร้อย'),
                ]);
                return $this->redirect(['update', 'id' => $model->libaid_id]);
            }else{
                Yii::$app->getSession()->setFlash('addflsh', [
                    'type' => 'danger',
                    'duration' => 4000,
                    'icon' => 'glyphicon glyphicon-remove-circle',
                    'message' => Yii::t('app', 'เพิ่มรายการไม่ได้'),
                ]);
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
     * Updates an existing FormAutoLibraid model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        Yii::$app->view->title = Yii::t('app', 'ปรับปรุงรายการ {modelClass}: ', [
                'modelClass' => FormAutoLibraid::fn()['name'],
            ]) . $model->libaid_id.' - '.$this->moduletitle;

        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                Yii::$app->getSession()->setFlash('addflsh', [
                    'type' => 'success',
                    'duration' => 4000,
                    'icon' => 'glyphicon glyphicon-ok-circle',
                    'message' => Yii::t('app', 'เพิ่มรายการใหม่เรียบร้อย'),
                ]);
                return $this->redirect(['update', 'id' => $model->libaid_id]);
            }else{
                Yii::$app->getSession()->setFlash('addflsh', [
                    'type' => 'danger',
                    'duration' => 4000,
                    'icon' => 'glyphicon glyphicon-remove-circle',
                    'message' => Yii::t('app', 'เพิ่มรายการไม่ได้'),
                ]);
            }
            print_r($model->getErrors());exit;
        } else {

            $qstaff = Person::getPersonList();

            $intmdl = MainIntercom::find()
                ->where(['staff_id' => $model->libaid_stid])
                ->one();

            $searchModel = new FormAutoLibraidetailSearch(['libraidet_mainid' => $model->libaid_id]);
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->sort = false;

            return $this->render('update', [
                'model' => $model,
                'staff' => $qstaff,
                'intmdl' => $intmdl,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Deletes an existing FormAutoLibraid model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FormAutoLibraid model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FormAutoLibraid the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FormAutoLibraid::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findModeldetail($id)
    {
        if (($model = FormAutoLibraidetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('ไม่พบหน้าที่ต้องการ.');
        }
    }

    public function actionQadddetail($id)
    {
        $model = new FormAutoLibraidetail();

        if ($model->load(Yii::$app->request->post())) {

            $model->libraidet_mainid = $id;
            //$model->exminfo_fee = $this->cal($model->exminfo_type, $model->exminfo_degree, $model->exminfo_hour, $model->exminfo_stdamount);

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
            ->where(['staff_id' => $model->libaid_stid])
            ->one();
        if(!empty($model->formAutoLibraidetails)) {
            $details = FormAutoLibraidetail::findAll([
                'libraidet_mainid' => $model->libaid_id,
            ]);
        }else{
            return $this->redirect(['update', 'id' => $model->libaid_id]);
        }
        $sumdetails = FormAutoLibraidetail::find()->where(['libraidet_mainid' => $model->libaid_id])->sum('libraidet_amount');
        $thaibathtext1 = str_replace('​', '', \Yii::$app->formatter->asSpellout($sumdetails));
        $thaibathtext2 = str_replace('​', '', \Yii::$app->formatter->asSpellout($model->libaid_reqamount));
//        return $this->renderPartial('print', [
//            'model' => $model,
//            'intmdl' => $intmdl,
//            'details' => $details,
//            'thaibathtext' => $thaibathtext,
//        ]);
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'content' => $this->renderPartial('print', [
                'model' => $model,
                'intmdl' => $intmdl,
                'details' => $details,
                'thaibathtext1' => $thaibathtext1,
                'thaibathtext2' => $thaibathtext2,
            ]),
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
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
}
