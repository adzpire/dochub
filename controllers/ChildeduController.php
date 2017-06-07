<?php

namespace backend\modules\dochub\controllers;

use Yii;
use backend\modules\dochub\models\FormAutoCe;
use backend\modules\dochub\models\FormAutoCeSearch;

use backend\modules\person\models\Person;

use backend\modules\intercom\models\MainIntercom;

use backend\modules\thailocale\models\LocaleProvince;
use backend\modules\thailocale\models\LocaleAmphur;

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
 * ChildeduController implements the CRUD actions for FormAutoCe model.
 */
class ChildeduController extends Controller
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
    public function beforeAction(){
        //$this->checkperson = Person::findOne([Yii::$app->user->id]);
        $this->moduletitle = Yii::t('app', Yii::$app->controller->module->params['title']);
        return true;
    }
    /**
     * Lists all FormAutoCe models.
     * @return mixed
     */
    public function actionIndex()
    {
        Yii::$app->view->title = ' รายการ '.FormAutoCe::fn()['name']. ' - '.$this->moduletitle;

        $searchModel = new FormAutoCeSearch(['ce_stid' => Yii::$app->user->id]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FormAutoCe model.
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
     * Creates a new FormAutoCe model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        Yii::$app->view->title = Yii::t('app', 'สร้างใหม่').' - '.$this->moduletitle;

        $model = new FormAutoCe();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        $model->ce_whole = 0;$model->ce_piece = 0;$model->ce_half = 0;
        if ($model->load(Yii::$app->request->post())) {
            $model->ce_date = date('Y-m-d');
            //$model->ce_sum = $model->ce_whole + $model->ce_piece + $model->ce_half;
            if($model->save()){
                Yii::$app->getSession()->setFlash('addflsh', [
                    'type' => 'success',
                    'duration' => 4000,
                    'icon' => 'glyphicon glyphicon-ok-circle',
                    'message' => Yii::t('app', 'เพิ่มรายการใหม่เรียบร้อย'),
                ]);
                return $this->redirect(['update', 'id' => $model->fid]);
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
            $province = LocaleProvince::getProvinceList();
            $amphur = LocaleAmphur::getAmphurList();
            return $this->render('create', [
                'model' => $model,
                'staff' => $qstaff,
                'spwork' => $model->getItemSpworktype(),
                'birthright' => $model->getItemBirthright(),
                'chfee' => $model->getItemChfee(),
                'confirm' => $model->getItemConfirm(),
                'province' => $province,
                'amphur'=> $amphur,
            ]);
        }
    }

    /**
     * Updates an existing FormAutoCe model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        Yii::$app->view->title = Yii::t('app', 'ปรับปรุงรายการ {modelClass}: ', [
                'modelClass' => $model::fn()['name'],
            ]) . $model->fid.' - '.$this->moduletitle;

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {
            //$model->ce_sum = $model->ce_whole + $model->ce_piece + $model->ce_half;
            if($model->save()){
                Yii::$app->getSession()->setFlash('addflsh', [
                    'type' => 'success',
                    'duration' => 4000,
                    'icon' => 'glyphicon glyphicon-ok-circle',
                    'message' => Yii::t('app', 'เพิ่มรายการใหม่เรียบร้อย'),
                ]);
                return $this->redirect(['update', 'id' => $model->fid]);
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
            $province = LocaleProvince::getProvinceList();
            $amphur = LocaleAmphur::getAmphurList();

            return $this->render('update', [
                'model' => $model,
                'staff' => $qstaff,
                'spwork' => $model->getItemSpworktype(),
                'birthright' => $model->getItemBirthright(),
                'chfee' => $model->getItemChfee(),
                'confirm' => $model->getItemConfirm(),
                'province' => $province,
                'amphur'=> $amphur,
            ]);
        }
    }

    /**
     * Deletes an existing FormAutoCe model.
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
     * Finds the FormAutoCe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FormAutoCe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FormAutoCe::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

//    public function actionGetAmphur() {
//        $out = $this->getAmphur(74);
//        echo Json::encode(['output'=>$out, 'selected'=>'']);
//        return;
//        $out = [];
//        if (isset($_POST['depdrop_parents'])) {
//            $parents = $_POST['depdrop_parents'];
//            if ($parents != null) {
//                $province_id = $parents[0];
//                $out = $this->getAmphur($province_id);
//                echo Json::encode(['output'=>$out, 'selected'=>'']);
//                return;
//            }
//        }
//        echo Json::encode(['output'=>'', 'selected'=>'']);
//    }
//
//    protected function getAmphur($id){
//        $datas = LocaleAmphur::find()->where(['PROVINCE_ID'=>$id])->all();
//        return ArrayHelper::map($datas, 'AMPHUR_ID', 'AMPHUR_NAME');
//        return $this->MapData($datas,'AMPHUR_ID','AMPHUR_NAME');
//    }
//
//    protected function MapData($datas,$fieldId,$fieldName){
//        $obj = [];
//        foreach ($datas as $key => $value) {
//            array_push($obj, ['id'=>$value->{$fieldId},'name'=>$value->{$fieldName}]);
//        }
//        return $obj;
//    }

    public function actionPdf($id)
    {
        $model = ($id == 'example') ?$this->findModel(0) : $this->findModel($id);

        $intmdl = MainIntercom::find()
            ->where(['staff_id' => $model->ce_stid])
            ->one();
        $thaibathtext = str_replace('​', '', \Yii::$app->formatter->asSpellout($model->ce_sum));
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
