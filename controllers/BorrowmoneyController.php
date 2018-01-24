<?php

namespace backend\modules\dochub\controllers;

use Yii;
use backend\modules\dochub\models\FormAutoBrmn;
use backend\modules\dochub\models\FormAutoBrmnSearch;

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

    public function beforeAction($action)
    {
        //$this->checkperson = Person::findOne([Yii::$app->user->id]);
        $this->moduletitle = Yii::t('app', Yii::$app->controller->module->params['title']);
        return parent::beforeAction($action);
    }

    /**
     * Lists all FormAutoBrmn models.
     * @return mixed
     */
    public function actionIndex()
    {

        Yii::$app->view->title = ' รายการ '.FormAutoBrmn::fn()['name']. ' - ' . $this->moduletitle;

        $searchModel = new FormAutoBrmnSearch(['brmn_stid' => Yii::$app->user->id]);
        /*if (\Yii::$app->authManager-> getAssignment('docHubStaff',Yii::$app->user->getId())){
            echo '11';
        }else{
            echo '333';
        }
        exit;*/
        if (\Yii::$app->authManager->getAssignment('docHubStaff', Yii::$app->user->getId())) {

        } else {
            $searchModel->brmn_stid = \Yii::$app->user->id;
        }
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'choicearr' => FormAutoBrmn::getItemChoice(),
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

        Yii::$app->view->title = Yii::t('app', 'ดูรายละเอียด') . ' : ' . $model->brmn_id . ' - ' . $this->moduletitle;

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
        Yii::$app->view->title = Yii::t('app', 'สร้างใหม่') . ' - ' . $this->moduletitle;

        $model = new FormAutoBrmn();

        /* if enable ajax validate*/
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                AdzpireComponent::succalert('addflsh', 'เพิ่มรายการใหม่เรียบร้อย');
                return $this->redirect(['update', 'id' => $model->brmn_id]);
            } else {
                AdzpireComponent::dangalert('addflsh', 'เพิ่มรายการไม่ได้');
            }
            print_r($model->getErrors());
            exit;
        }

        $qstaff = Person::getPersonList();

        return $this->render('create', [
            'model' => $model,
            'staff' => $qstaff,
            'choicearr' => FormAutoBrmn::getItemChoice(),
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

        Yii::$app->view->title = Yii::t('app', 'ปรับปรุงรายการ ') . FormAutoBrmn::fn()['name'] . ' หมายเลข: ' . $model->brmn_id . ' - ' . $this->moduletitle;

        /* if enable ajax validate*/
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                AdzpireComponent::succalert('edtflsh', 'ปรับปรุงรายการเรียบร้อย');
                return $this->redirect(['view', 'id' => $model->brmn_id]);
            } else {
                AdzpireComponent::dangalert('edtflsh', 'ปรับปรุงรายการไม่ได้');
            }
            print_r($model->getErrors());exit();
        }

        $qstaff = Person::getPersonList();

        $intmdl = MainIntercom::find()
            ->where(['staff_id' => $model->brmn_stid])
            ->one();

        return $this->render('update', [
            'model' => $model,
            'staff' => $qstaff,
            'intmdl' => $intmdl,
            'choicearr' => FormAutoBrmn::getItemChoice(),
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

        AdzpireComponent::succalert('edtflsh', 'ลบรายการเรียบร้อย');

        return $this->redirect(['index']);
    }

    public function actionPrint($id)
    {
        $model = $this->findModel($id);

        $intmdl = MainIntercom::find()
            ->where(['staff_id' => $model->brmn_stid])
            ->one();

        return $this->renderPartial('print2', [
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
        } else {
            echo json_encode(['-', '-']);
        }
    }

    public function actionPdf($id)
    {

        $model = ($id == 'example') ?$this->findModel(0) : $this->findModel($id);

        $intmdl = MainIntercom::find()
            ->where(['staff_id' => $model->brmn_stid])
            ->one();
        $thaibathtext = AdzpireComponent::thaibath($model->brmn_borrow);

        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'content' => $this->renderPartial('print', [
                'model' => $model,
                'intmdl' => $intmdl,
                'thaibathtext' => $thaibathtext,
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
                  font-size: 22px;
                  font-weight: 900;
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

    public function actionPdf2($id)
    {

        $model = ($id == 'example') ?$this->findModel(0) : $this->findModel($id);

        $intmdl = MainIntercom::find()
            ->where(['staff_id' => $model->brmn_stid])
            ->one();
        $thaibathtext = AdzpireComponent::thaibath($model->brmn_borrow);

        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'content' => $this->renderPartial('print2', [
                'model' => $model,
                'intmdl' => $intmdl,
                'thaibathtext' => $thaibathtext,
            ]),
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'options' => [
                'title' => 'แบบฟอร์มขออนุมัติยืมเงินหมุนเวียนคณะวิทยาการสื่อสาร',
                'subject' => 'Generating PDF files via yii2-mpdf extension has never been easy'
            ],
            'cssInline' => '
                body {
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
                  font-weight: 900;
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
