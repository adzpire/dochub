<?php

use yii\bootstrap\Html;

use backend\components\Monav;

use kartik\dynagrid\DynaGrid;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\dochub\models\FormAutoSessionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="col-md-12">
    <h3 class="text-center">แบบฟอร์มอัตโนมัติ</h3>
    <div class="col-md-5">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo Html::icon('piggy-bank').' งานการเงิน' ?></h3>
            </div>
            <div class="table">
                <?php
                echo Monav::widget([
                    'encodeLabels' => false,
                    'items' => [
                        [
                            'label' => Html::icon($searchModel::farr(2)['borrowmoney']).' '.$searchModel::farr()['borrowmoney'],
                            'url' => ['/dochub/'.'borrowmoney'],
                        ],
                        [
                            'label' => Html::icon($searchModel::farr(2)['revolvmoney']).' '.$searchModel::farr()['revolvmoney'],
                            'url' => ['/dochub/'.'revolvmoney'],
                        ],
                        [
                            'label' => Html::icon($searchModel::farr(2)['usebudget']).' '.$searchModel::farr()['usebudget'],
                            'url' => ['/dochub/'.'usebudget'],
                            //'count' => 'backend\modules\tc\models\DefaultUncompleteSearch',
                        ],
                        [
                            'label' => Html::icon($searchModel::farr(2)['biblioaid']).' '.$searchModel::farr()['biblioaid'],
                            'url' => ['/dochub/'.'biblioaid'],
                        ],
                        [
                            'label' => Html::icon($searchModel::farr(2)['examfee']).' '.$searchModel::farr()['examfee'],
                            'url' => ['/dochub/'.'examfee'],
                        ],
                        [
                            'label' => Html::icon($searchModel::farr(2)['childedu']).' '.$searchModel::farr()['childedu'],
                            'url' => ['/dochub/'.'childedu'],
                        ],
                        [
                            'label' => Html::icon($searchModel::farr(2)['mf']).' '.$searchModel::farr()['mf'],
                            'url' => ['/dochub/'.'mf'],
                        ],
                        [
                            'label' => Html::icon($searchModel::farr(2)['childedugov']).' '.$searchModel::farr()['childedugov'],
                            'url' => ['/dochub/'.'childedugov'],
                        ],
                        [
                            'label' => Html::icon($searchModel::farr(2)['medicfeegov']).' '.$searchModel::farr()['medicfeegov'],
                            'url' => ['/dochub/'.'medicfeegov'],
                        ],
                        [
                            'label' => Html::icon($searchModel::farr(2)['receipt']).' '.$searchModel::farr()['receipt'],
                            'url' => ['/dochub/'.'receipt'],
                        ],
                    ],
                    'options' => ['class' => 'nav-stacked'], // set this to nav-tab to get tab-styled navigation
                ]); ?>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo Html::icon('scissors').' งานพัสดุ' ?></h3>
            </div>
            <div class="table">
                <?php
                echo Monav::widget([
                    'encodeLabels' => false,
                    'items' => [
                        [
                            'label' => Html::icon($searchModel::farr(2)['unplanbudget']).' '.$searchModel::farr()['unplanbudget'],
                            'url' => ['/dochub/'.'unplanbudget'],
                        ],
                        [
                            'label' => Html::icon($searchModel::farr(2)['hirebudget']).' '.$searchModel::farr()['hirebudget'],
                            'url' => ['/dochub/'.'hirebudget'],
                            //'count' => 'backend\modules\tc\models\DefaultUncompleteSearch',
                        ],
                        /*[
                            'label' => Html::icon($searchModel::farr(2)['inventoryrepair']).' '.$searchModel::farr()['inventoryrepair']. Html::tag('span', 'new', ['class' => 'badge pull-right']),
                            'url' => ['/dochub/'.'inventoryrepair'],
                        ],*/
                    ],
                    'options' => ['class' => 'nav-stacked'], // set this to nav-tab to get tab-styled navigation
                ]); ?>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo Html::icon('education').' งานวิชาการ' ?></h3>
            </div>
            <div class="table">
                <?php
                /*echo Monav::widget([
                    'encodeLabels' => false,
                    'items' => [
                        [
                            'label' => Html::icon('ok-circle').' ฟอร์มสมัคร/ลงทะเบียนกิจกรรมด้วย PSU Passport',
                            'url' => ['/dochub/'.'etd'],
                        ],
                    ],
                    'options' => ['class' => 'nav-stacked'], // set this to nav-tab to get tab-styled navigation
                ]);*/ ?>
            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo Html::icon('scissors').' งานเทคโนโลยีสารสนเทศ' ?></h3>
            </div>
            <div class="table">
                <?php
                echo Monav::widget([
                    'encodeLabels' => false,
                    'items' => [
                        [
                            'label' => Html::icon($searchModel::farr(2)['pp']).' '.$searchModel::farr()['pp'],
                            'url' => ['/dochub/'.'pp'],
                        ],
                        [
                            'label' => Html::icon('qrcode').' สร้าง QR code'. Html::tag('span', 'new', ['class' => 'badge pull-right']),
                            'url' => ['/dochub/'.'default/createqr'],
                        ],
                    ],
                    'options' => ['class' => 'nav-stacked'], // set this to nav-tab to get tab-styled navigation
                ]); ?>
            </div>
        </div>

    </div>

    <div class="col-md-7">
        <?= DynaGrid::widget([
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'fss_id',
                    'headerOptions' => [
                        'width' => '50px',
                    ],
                ],
                //'fss_fid',
                //'fss_type',
                [
                    'attribute' => 'fss_type',
                    'value' => function ($model) {
                        return $model->getForm();
                    },
                    'filter'=> $ftype,
                    'format' => ['html']
                ],
                //'created_at',
                //'created_by',
                //'updated_at',
                [
                    'attribute' => 'updated_at',
                    'format' => ['date', 'long']
                ],
                // 'updated_by',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{print}',
                    'buttons' => [
                        'print' => function ($url, $model, $key) {
                            return Html::a(Html::icon('print'), ['/dochub/'.$model->fss_type.'/pdf?id='.$model->fss_fid], ['data-pjax'=>0, 'target'=>'_blank']);
                        }
                    ],
                    'headerOptions' => [
                        'width' => '50px',
                    ],
                    'contentOptions' => [
                        'class' => 'text-center',
                    ],
                'header' => 'พิมพ์',
                'order'=>DynaGrid::ORDER_FIX_RIGHT,
                ],
            ],	
            'theme'=>'panel-warning',
            'showPersonalize'=>true,
            'storage' => 'session',
            'toggleButtonGrid' => [
                'label' => '<span class="glyphicon glyphicon-wrench">ปรับแต่งตาราง</span>'
            ],
            'gridOptions'=>[
                'dataProvider'=>$dataProvider,
                'filterModel'=>$searchModel,
                // 'showPageSummary'=>true,
                // 'floatHeader'=>true,
                'pjax'=>true,
                'hover'=>true,
                'pager' => [
                    'firstPageLabel' => Yii::t('app', 'รายการแรกสุด'),
                    'lastPageLabel' => Yii::t('app', 'รายการท้ายสุด'),
                ],
                'resizableColumns'=>true,
                'responsiveWrap'=>false,
                'panel'=>[
                    'heading'=>'<h3 class="panel-title">'.Html::icon('th-list').' รายการฟอร์มล่าสุด</h3>',
                    // 'before' =>  '<div style="padding-top: 7px;"><em>* The table header sticks to the top in this demo as you scroll</em></div>',
                    'after' => false
                ],
                'toolbar' =>  [
                    ['content'=>'{dynagrid}'],
                ],
                
            ],
            'options'=>['id'=>'dynagrid-dfltdochub'] // a unique identifier is important
        ]); ?>
        
    </div>

</div>